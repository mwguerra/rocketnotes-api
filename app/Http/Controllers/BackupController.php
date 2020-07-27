<?php

namespace App\Http\Controllers;

use App\Notifications\BackupNotification;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function __invoke(Request $request) {
        $request->user()->notify(new BackupNotification());

        return response()->json('The backup was sent to your email', 200);
    }
}
