<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ParticipantType;

class ParticipantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParticipantType::factory()->create(['name' => "全体教师", 'condition' => 'is_working:1']);
        ParticipantType::factory()->create(['name' => "党员教师", 'condition' => 'is_working:1,is_member:1']);
        ParticipantType::factory()->create(['name' => "在职教师", 'condition' => 'is_working:1,is_formal:1']);
        ParticipantType::factory()->create(['name' => "临聘教师", 'condition' => 'is_working:1,is_formal:0']);
    }
}
