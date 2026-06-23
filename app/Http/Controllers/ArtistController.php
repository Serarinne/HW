<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $query = trim((string) $request->input('q', ''));

        $artists = Artist::query()
            ->when($query !== '', function ($q) use ($query) {
                $q->search($query);
            })
            ->indexList()
            ->paginate(30)
            ->appends(['q' => $query]);

        return view('artists.index', compact('artists', 'query'));
    }

    public function show(string $slug)
    {
        $artist = Artist::query()
            ->with(['dataCount', 'links', 'user'])
            ->where('slug', $slug)
            ->firstOrFail();

        $wallpapers = $artist->wallpapers()
            ->published()
            ->allowedRating()
            ->latest('id')
            ->paginate(32);

        return view('artists.show', compact('artist', 'wallpapers'));
    }
}