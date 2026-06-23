<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Series;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $query = trim((string) $request->input('q', ''));

        $characters = Character::query()
            ->hasWallpapers()
            ->with(['series' => function ($q) {
                $q->select('series.id', 'series.name', 'series.slug');
            }])
            ->published()
            ->allowedRating()
            ->has('series')
            ->when($query !== '', fn ($q) => $q->search($query))
            ->orderByDesc('dc.total')
            ->latest('characters.created_at')
            ->paginate(30)
            ->appends(['q' => $query]);

        return view('characters.index', compact('characters', 'query'));
    }

    public function show(string $characterSlug)
    {
        $character = Character::published()
            ->allowedRating()
            ->where('characters.slug', $characterSlug)
            ->select('characters.*')
            ->firstOrFail();

        $wallpapers = $character->wallpapers()
            ->select('wallpapers.id', 'wallpapers.slug', 'wallpapers.thumbnail')
            ->published()
            ->allowedRating()
            ->latest('wallpapers.created_at')
            ->paginate(32);

        return view('characters.show', compact('character', 'wallpapers'));
    }
}