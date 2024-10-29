<?php

namespace App\Console\Commands;

use App\Mail\PendingTasksEmail;
use App\Models\Task;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Console\Command;

class SendPendingTasksEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:send-pending-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notifications for pending tasks';

    private $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $tasks = Task::where('user_id', $user->id)
                ->where('status', 'Pending')
                ->whereDate('due_date', '=', now()->toDateString())
                ->get();

            if ($tasks->isNotEmpty()) {
                PendingTasksEmail::dispatch($user, $tasks);
            }
        }
        return 0;
    }
}
