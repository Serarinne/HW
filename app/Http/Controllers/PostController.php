<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->latest('id')
            ->paginate(12);

        return view('posts.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $this->incrementViews($post);

        return view('posts.show', compact('post'));
    }

    private function incrementViews(Post $post)
    {
        $ip = request()->ip();
        $key = 'view_post_' . $post->id . '_' . $ip;

        if (Cache::has($key)) {
            return;
        }

        $originalUpdatedAt = $post->updated_at;

        \DB::table('posts')
            ->where('id', $post->id)
            ->update([
                'views_count' => $post->views_count + 1,
                'updated_at' => $originalUpdatedAt,
            ]);

        Cache::put($key, true, now()->addDays(1));
    }
}