<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wallpaper;
use App\Models\User;
use App\Models\Post;
use App\Models\Character;
use App\Models\Tag;
use App\Models\Series;
use App\Models\Artist;

class AdminController extends Controller
{
    public function index()
    {
        $totalWallpapers = Wallpaper::count();
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $totalCharacters = Character::count();
        $totalTags = Tag::count();
        $totalSeries = Series::count();
        $totalArtists = Artist::count();

        $fetchWallpaperPending = DB::table('fetched_wallpapers')->where('status', 'pending')->count();
        $fetchWallpaperProcessing = DB::table('fetched_wallpapers')->where('status', 'processing')->count();
        $fetchWallpaperFailed = DB::table('fetched_wallpapers')->where('status', 'failed')->count();

        $taskFetchRunning = DB::table('fetch_tasks')->where('status', 'running')->count();
        $taskFetchCompleted = DB::table('fetch_tasks')->where('status', 'completed')->count();
        $taskFetchPending = DB::table('fetch_tasks')->where('status', 'pending')->count();

        $createdStats = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->whereNotNull('created_at')
            ->groupBy('date')
            ->get()
            ->pluck('count', 'date');

        $modifiedStats = User::select(DB::raw('DATE(updated_at) as date'), DB::raw('count(*) as count'))
            ->whereNotNull('updated_at')
            ->groupBy('date')
            ->get()
            ->pluck('count', 'date');

        $allDates = $createdStats->keys()
            ->concat($modifiedStats->keys())
            ->unique()
            ->sortDesc()
            ->take(7)
            ->sort()
            ->values();

        $chartLabels = [];
        $chartDataCreated = [];
        $chartDataModified = [];

        foreach ($allDates as $date) {
            $chartLabels[] = \Carbon\Carbon::parse($date)->format('d M Y');
            $chartDataCreated[] = $createdStats->get($date, 0);
            $chartDataModified[] = $modifiedStats->get($date, 0);
        }

        return view('admin.dashboard.index', compact(
            'totalWallpapers',
            'totalUsers',
            'totalPosts',
            'totalCharacters',
            'totalTags',
            'totalSeries',
            'totalArtists',
            'fetchWallpaperPending',
            'fetchWallpaperProcessing',
            'fetchWallpaperFailed',
            'taskFetchRunning',
            'taskFetchCompleted',
            'taskFetchPending',
            'chartLabels',
            'chartDataCreated',
            'chartDataModified'
        ));
    }

    public function settings()
    {
        $settings = DB::table('settings')->first();

        return view('admin.dashboard.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'package_name' => 'required|string|max:255',
            'app_version' => 'required|string|max:255',
            'build_version' => 'required|integer',
            'url_playstore' => 'nullable|url',
            'banner_provider' => 'required|string|max:50',
            'open_app_provider' => 'required|string|max:50',
            'transition_mode' => 'required|string|max:50',
            'ad_interval' => 'required|integer',
            'admob_app_id' => 'nullable|string|max:255',
            'admob_banner_id' => 'nullable|string|max:255',
            'admob_interstitial_id' => 'nullable|string|max:255',
            'admob_rewarded_id' => 'nullable|string|max:255',
            'admob_rewarded_interstitial_id' => 'nullable|string|max:255',
            'admob_open_app_id' => 'nullable|string|max:255',
            'applovin_sdk_key' => 'nullable|string|max:255',
            'applovin_banner_id' => 'nullable|string|max:255',
            'applovin_interstitial_id' => 'nullable|string|max:255',
            'applovin_rewarded_id' => 'nullable|string|max:255',
            'applovin_open_app_id' => 'nullable|string|max:255',
        ]);

        $settings = DB::table('settings')->first();

        if ($settings) {
            DB::table('settings')->where('id', $settings->id)->update(array_merge($validated, [
                'updated_at' => now(),
            ]));
        } else {
            DB::table('settings')->insert(array_merge($validated, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        return redirect()->route('admin.settings')->with('success', 'Application settings updated successfully.');
    }
}