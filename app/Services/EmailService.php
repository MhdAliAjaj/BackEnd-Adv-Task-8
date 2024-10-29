<?php

namespace App\Services;

use App\Mail\PendingTasksEmail;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendPendingTasksEmail($user, $pendingTasks)
    {
        Mail::to($user->email)->send(new PendingTasksEmail($pendingTasks));
    }
}