<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TasksTodaySeeder extends Seeder
{
    public function run(): void
    {
        $today = Carbon::today();

        User::create([
            'username'  => 'eidref',
            'full_name' => 'Eidref Cyrus Bauza',
            'email'     => 'eidrefcyrus@gmail.com',
        ]);

        Task::insert([
            [
                'title' => 'Buy school supplies',
                'status' => 'pending',
                'task_date' => $today->copy()->subDays(2)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Clean study table',
                'status' => 'completed',
                'task_date' => $today->copy()->subDays(1)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Review database tables',
                'status' => 'completed',
                'task_date' => $today->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Finish Laravel activity',
                'status' => 'pending',
                'task_date' => $today->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Read Module 3',
                'status' => 'pending',
                'task_date' => $today->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Prepare project screenshots',
                'status' => 'pending',
                'task_date' => $today->copy()->addDay()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Plan tomorrow tasks',
                'status' => 'pending',
                'task_date' => $today->copy()->addDays(2)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Update GitHub repository',
                'status' => 'pending',
                'task_date' => $today->copy()->addDays(2)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}