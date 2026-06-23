<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedeemController extends Controller
{
    public function index()
    {
        $codes = DB::table('redeem_codes')
            ->where('is_active', 1)
            ->where(function ($query) {
                $query->whereNull('expired_at')
                    ->orWhere('expired_at', '>', now());
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('redeems.index', compact('codes'));
    }
}