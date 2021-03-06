<?php

namespace App\Http\Controllers\Api;

use App\Account;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Broadcast;

class BroadcastController extends Controller
{
    public function index($broadcastType)
    {
        $broadcasts = Broadcast::with('log')->with('log.category')->where('type', $broadcastType)->orderByDesc('id')->limit(5)->get();

        return response()->json($broadcasts, 200);
    }

    public function account(Account $account, $broadcastType)
    {
        $broadcasts = Broadcast::with('log')->with('log.category')->where('message', 'NOT LIKE', '%logged%')->whereHas('log', function ($query) use($account) {
            return $query->where('account_id', '=', $account->id);
        })->where('type', $broadcastType)->orderByDesc('id')->paginate(10);

        return response()->json($broadcasts, 200);
    }

    public function recent($broadcastType)
    {
        $broadcasts = Broadcast::with('log')->with('log.category')->where('type', $broadcastType)->orderByDesc('id')->get();

        $recentBroadcasts = [];

        foreach ($broadcasts->sortBy('id') as $broadcast) {
            if ($broadcast->created_at->diffInSeconds() <= 5) {
                $recentBroadcasts[] = $broadcast->message;
            }
        }

        return response()->json($recentBroadcasts, 200);
    }
}
