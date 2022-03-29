<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;


class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'dome',
            'email' => 'dome@gmail.com',
            'password' => 'dome2544'
        ]);

        User::create([
            'id' => 2,
            'name' => 'beam',
            'email' => 'beam@gmail.com',
            'password' => 'beam2543'
        ]);

        User::create([
            'id' => 3,
            'name' => 'parn',
            'email' => 'parn@gmail.com',
            'password' => 'parn2543'
        ]);

        Task::create([
            'user_id' => 1,
            'description' => 'Dome01',
            'date' => '23/3/2565',
            'deadline' => '24/3/2565'
        ]);

        Task::create([
            'user_id' => 1,
            'description' => 'Dome02',
            'date' => '23/3/2565',
            'deadline' => '24/3/2565'
        ]);

        Task::create([
            'user_id' => 1,
            'description' => 'Dome03',
            'date' => '23/3/2565',
            'deadline' => '24/3/2565'
        ]);

        Task::create([
            'user_id' => 2,
            'description' => 'Beam01',
            'date' => '23/3/2565',
            'deadline' => '24/3/2565'
        ]);

        Task::create([
            'user_id' => 2,
            'description' => 'Beam02',
            'date' => '23/3/2565',
            'deadline' => '24/3/2565'
        ]);

        Task::create([
            'user_id' => 2,
            'description' => 'Beam03',
            'date' => '23/3/2565',
            'deadline' => '24/3/2565'
        ]);

        Task::create([
            'user_id' => 3,
            'description' => 'Parn01',
            'date' => '23/3/2565',
            'deadline' => '24/3/2565'
        ]);

        Task::create([
            'user_id' => 3,
            'description' => 'Parn02',
            'date' => '23/3/2565',
            'deadline' => '24/3/2565'
        ]);

        Task::create([
            'user_id' => 3,
            'description' => 'Parn03',
            'date' => '23/3/2565',
            'deadline' => '24/3/2565'
        ]);
    }
}

