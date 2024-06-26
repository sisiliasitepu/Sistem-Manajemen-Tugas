<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $now = \Carbon\Carbon::now();
            $tasks = \App\Models\Task::where('reminder', '<=', $now)->get();

            foreach ($tasks as $task) {
                $task->user->notify(new \App\Notifications\TaskReminder($task));
            }
        })->everyMinute();
    }
}
