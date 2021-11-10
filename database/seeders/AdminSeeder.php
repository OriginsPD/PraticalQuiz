<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'username' => 'Akeem Henry',
            'email' => 'Henryakeem72@gmail.com',
            'password' => 'MADMAN123',
            'usertype' => 1,
        ]);
    }
}
