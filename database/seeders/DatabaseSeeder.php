<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => '文杰',
        //     'phone' => '18073100720',
        // ]);

        $this->call([
            SchoolSeeder::class,
            BasicAdminPermissionSeeder::class,
            UserSeeder::class,
            ParticipantTypeSeeder::class,
            TaskTypeSeeder::class,
            TaskSeeder::class,
            // PostSeeder::class,
            // CommentSeeder::class,
        ]);
    }
}
