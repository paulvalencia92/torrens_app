<?php

use App\Task;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Paul Valencia',
            'email' => 'apvalencia92@gmail.com',
            'phone_number' => '3188308972',
            'status' => true,
            'role' => User::ADMIN,
            'password' => bcrypt('Passw0rd'),
        ]);

        factory(User::class)->times(10)->create()->each(function ($user) {
            factory(Task::class)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
