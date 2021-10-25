<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => "Admin",
            'last_name' => "Homie",
            'phone' => "5555555555",
            'email' => "admin@homie.com",
            'password' => bcrypt('homie__2021_*'),

        ]);

        $user->assignRole('admin');
    }
}
