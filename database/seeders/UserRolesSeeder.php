<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'role' => 'Admin',
        ]);

        UserType::create([
            'role' => 'Teacher',
        ]);

        UserType::create([
            'role' => 'Student',
        ]);
    }
}
