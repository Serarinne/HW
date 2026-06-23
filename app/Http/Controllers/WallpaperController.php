<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class WallpaperController extends Controller
{
    public function index()
    {
        $wallpapers = Wallpaper::query()
            ->select('id', 'slug', 'thumbnail', 'height', 'width', 'views_count', 'seo_title')
            ->published()
            ->allowedRating()
            ->latest('id')
            ->paginate(30);

        $popularWallpapers = Wallpaper::query()
            ->select('id', 'slug', 'thumbnail', 'seo_title')
            ->published()
            ->allowedRating()
            ->where('created_at', '>=', now()->subDays(7))
            ->withCount('favorites')
            ->orderByDesc('favorites_count')
            ->limit(6)
            ->get();

        // $trendingTags = Tag::query()
        //     ->select('id', 'slug', 'image', 'name')
        //     ->published()
        //     ->allowedRating()
        //     ->trending(8)
        //     ->get();

        // return view('wallpapers.index', compact('wallpapers', 'popularWallpapers', 'trendingTags'));
        return view('wallpapers.index', compact('wallpapers', 'popularWallpapers'));
    }

    public function search(Request $request)
    {
        $query = trim((string) $request->input('q', ''));

        if ($query === '') {
            return view('wallpapers.search', [
                'query' => $query,
                'wallpapers' => collect(),
            ]);
        }

        $wallpapers = Wallpaper::query()
            ->published()
            ->allowedRating()
            ->when($query !== '', function ($q) use ($query) {
                $q->search($query);
            })
            ->latest('id')
            ->paginate(30)
            ->appends(['q' => $query]);

        return view('wallpapers.search', compact('wallpapers', 'query'));
    }

    public function redirectToSlug($id)
    {
        $wallpaper = Cache::remember('wallpaper_slug_by_id_' . $id, now()->addDays(30), function () use ($id) {
            return Wallpaper::query()
                ->select(['id', 'slug'])
                ->findOrFail($id);
        });

        return redirect()->route('wallpapers.show', ['slug' => $wallpaper->slug]);
    }

    public function show(string $slug)
    {
        $wallpaper = Wallpaper::query()
            ->published()
            ->where('slug', $slug)
            ->with([
                'artists' => function ($query) {
                    $query->select(['artists.id', 'artists.name', 'artists.slug', 'artists.image']);
                },
                'tags' => function ($query) {
                    $query->published()->allowedRating()
                        ->select(['tags.id', 'tags.name', 'tags.slug', 'tags.image']);
                },
                'characters' => function ($query) {
                    $query->published()->allowedRating()
                        ->whereHas('series')
                        ->select(['characters.id', 'characters.name', 'characters.slug', 'characters.image']);
                },
            ])
            ->firstOrFail();

        if (!$wallpaper->isVisibleToUser()) {
            if (Auth::guest()) {
                return redirect()->route('login')
                    ->with('error', 'Please log in to view this content.');
            }

            return redirect()->route('settings.edit')
                ->with('warning', 'This content is hidden by your current rating preferences. Please update your settings to view it.');
        }

        $this->incrementViews($wallpaper);

        return view('wallpapers.show', compact('wallpaper'));
    }

    private function incrementViews(Wallpaper $wallpaper)
    {
        $ip = request()->ip();
        $key = 'view_wallpaper_' . $wallpaper->id . '_' . $ip;

        if (Cache::has($key)) {
            return;
        }

        $originalUpdatedAt = $wallpaper->updated_at;

        \DB::table('wallpapers')
            ->where('id', $wallpaper->id)
            ->update([
                'views_count' => $wallpaper->views_count + 1,
                'updated_at' => $originalUpdatedAt,
            ]);

        Cache::put($key, true, now()->addDays(1));
    }
}