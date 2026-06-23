<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $wallpapers = Wallpaper::query()
            ->select('wallpapers.*')
            ->join('favorites', 'favorites.wallpaper_id', '=', 'wallpapers.id')
            ->where('favorites.user_id', $userId)
            ->published()
            ->allowedRating()
            ->latest('favorites.created_at')
            ->paginate(30);

        return view('favorites.index', compact('wallpapers'));
    }

    public function toggle($id)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Please log in first.'], 401);
        }

        $wallpaper = Wallpaper::published()->allowedRating()->findOrFail($id);
        $oldUpdatedAt = $wallpaper->updated_at;

        $isAdding = DB::transaction(function () use ($user, $wallpaper, $oldUpdatedAt) {
            $favorite = Favorite::where('user_id', $user->id)
                ->where('wallpaper_id', $wallpaper->id)
                ->first();

            if ($favorite) {
                $favorite->delete();

                DB::table('wallpapers')
                    ->where('id', $wallpaper->id)
                    ->decrement('favorites_count', 1, ['updated_at' => $oldUpdatedAt]);

                return false;
            }

            Favorite::create([
                'user_id' => $user->id,
                'wallpaper_id' => $wallpaper->id,
            ]);

            DB::table('wallpapers')
                ->where('id', $wallpaper->id)
                ->increment('favorites_count', 1, ['updated_at' => $oldUpdatedAt]);

            return true;
        });

        return response()->json([
            'is_favorited' => $isAdding,
            'favorites_count' => $isAdding ? ($wallpaper->favorites_count + 1) : ($wallpaper->favorites_count - 1),
            'message' => $isAdding ? 'Wallpaper added to favorites.' : 'Wallpaper removed from favorites.',
        ]);
    }
}