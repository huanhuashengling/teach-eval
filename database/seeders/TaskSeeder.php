<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\TaskLog;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::factory()->create(['name' => "2022年秋季开学工作会议", 'task_types_id' => '1', 'participant_types_id' => '1', 'happen_at' => '2022-08-18']);
        Task::factory()->create(['name' => "党员工作务虚会", 'task_types_id' => '1', 'participant_types_id' => '2', 'happen_at' => '2022-08-18']);
        Task::factory()->create(['name' => "开学教案提交", 'task_types_id' => '2', 'participant_types_id' => '3', 'happen_at' => '2022-08-18']);
    }
}
