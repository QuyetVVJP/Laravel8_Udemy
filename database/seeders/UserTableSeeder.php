<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = (int)$this->command->ask('Them bao nhieu nguoi dung?', 20);
        User::factory()->count($usersCount)->create();
    }
}
