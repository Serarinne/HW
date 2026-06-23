<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $query = trim((string) $request->input('q', ''));

        $tags = Tag::query()
            ->published()
            ->allowedRating()
            ->when($query !== '', function ($q) use ($query) {
                $q->search($query);
            })
            ->latest('id')
            ->paginate(30)
            ->withQueryString();

        return view('tags.index', compact('tags', 'query'));
    }

    public function show(string $slug)
    {
        $tag = Tag::query()
            ->published()
            ->allowedRating()
            ->where('slug', $slug)
            ->firstOrFail();

        $wallpapers = $tag->wallpapers()
            ->with('user')
            ->published()
            ->allowedRating()
            ->latest('id')
            ->paginate(32)
            ->withQueryString();

        return view('tags.show', compact('tag', 'wallpapers'));
    }
}