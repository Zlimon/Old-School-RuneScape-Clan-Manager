<?php

namespace App\Http\Controllers\Api;

use App\Account;
use App\Broadcast;
use App\Events\AccountAll;
use App\Events\AccountEvent;
use App\Events\AccountLevelUp;

use App\Events\AnnouncementAll;
use App\Events\EventAll;
use App\Http\Controllers\Controller;
use App\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountSkillController extends Controller
{
    public function update($accountUsername, $skillName, Request $request)
    {
        $account = Account::where('user_id', auth()->user()->id)->where('username', $accountUsername)->first();
        if (!$account) {
            return response($accountUsername . " is not authenticated with " . auth()->user()->name, 401);
        }

        DB::table($skillName)->where('account_id', $account->id)->update(['level' => $request->level]);

        $skill = DB::table($skillName)->where('account_id', $account->id)->first();

        $logData = [
            "user_id" => auth()->user()->id,
            "account_id" => $account->id,
            "category_id" => 1,
            "action" => $request->route()->getName(),
            "data" => $request->all()
        ];

        $log = Log::create($logData);

        $eventData = [
            "log_id" => $log->id,
            "type" => 'event',
            "icon" => strtolower($skillName),
            "message" => $accountUsername . " just achieved level " . $skill->level . " " . ucfirst($skillName) . "!",
        ];

        $event = Broadcast::create($eventData);

        EventAll::dispatch($event);

        AccountEvent::dispatch($account, $event);

        if ($skill->level == 99) {
            $announcementData = [
                "log_id" => $log->id,
                "type" => 'announcement',
                "icon" => strtolower($skillName),
                "message" => $accountUsername . " has achieved level 99 " . ucfirst($skillName) . "!",
            ];

            $announcement = Broadcast::create($announcementData);

            AnnouncementAll::dispatch($announcement);
        }

        return response("Advanced " . ucfirst($skillName) . " level for " . $accountUsername . " to level " . $request->level, 200);
    }
}
