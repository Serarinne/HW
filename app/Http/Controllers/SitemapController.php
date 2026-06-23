<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Character;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
    protected $limit = 10000;

    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function wallpaperIndex()
    {
        $query = Wallpaper::published()->allowedRating();

        $totalWallpapers = $query->count();
        $totalPages = max(1, ceil($totalWallpapers / $this->limit));

        $latest = (clone $query)->latest('updated_at')->first();

        return response()->view('sitemap.wallpaper_index', [
            'totalPages' => $totalPages,
            'latest' => $latest,
        ])->header('Content-Type', 'text/xml');
    }

    public function wallpapers($page)
    {
        $offset = ($page - 1) * $this->limit;

        $wallpapers = Wallpaper::published()->allowedRating()
            ->select('slug', 'updated_at')
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($wallpapers->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.wallpapers', compact('wallpapers'))
            ->header('Content-Type', 'text/xml');
    }

    public function characterIndex()
    {
        $query = Character::query()
            ->published()
            ->hasWallpapers()
            ->allowedRating()
            ->has('series')
            ->orderByDesc('dc.total')
            ->latest('characters.created_at');

        $totalCharacters = $query->count();
        $totalPages = max(1, ceil($totalCharacters / $this->limit));
        $latest = (clone $query)->latest('characters.updated_at')->first();

        return response()->view('sitemap.character_index', [
            'totalPages' => $totalPages,
            'latest' => $latest,
        ])->header('Content-Type', 'text/xml');
    }

    public function characters($page)
    {
        $offset = ($page - 1) * $this->limit;

        $characters = Character::query()
            ->published()
            ->hasWallpapers()
            ->with(['series' => function ($q) {
                $q->select('series.id', 'series.name', 'series.slug');
            }])
            ->allowedRating()
            ->has('series')
            ->orderByDesc('dc.total')
            ->latest('characters.created_at')
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($characters->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.characters', compact('characters'))
            ->header('Content-Type', 'text/xml');
    }

    public function tagIndex()
    {
        $query = Tag::query()
            ->published()
            ->allowedRating()
            ->latest('id');

        $totalTags = $query->count();
        $totalPages = max(1, ceil($totalTags / $this->limit));
        $latest = (clone $query)->latest('tags.updated_at')->first();

        return response()->view('sitemap.tag_index', [
            'totalPages' => $totalPages,
            'latest' => $latest,
        ])->header('Content-Type', 'text/xml');
    }

    public function tags($page)
    {
        $offset = ($page - 1) * $this->limit;

        $tags = Tag::query()
            ->published()
            ->allowedRating()
            ->select('slug', 'updated_at')
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($tags->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.tags', compact('tags'))
            ->header('Content-Type', 'text/xml');
    }
}