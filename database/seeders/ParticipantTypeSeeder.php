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
        ParticipantType::factory()->create(['name' => "全体", 'condition' => 'is_working:1']);
        ParticipantType::factory()->create(['name' => "党员", 'condition' => 'is_working:1,is_member:1']);
        ParticipantType::factory()->create(['name' => "在职", 'condition' => 'is_working:1,is_formal:1']);
        ParticipantType::factory()->create(['name' => "临聘", 'condition' => 'is_working:1,is_formal:0']);
    }
}
