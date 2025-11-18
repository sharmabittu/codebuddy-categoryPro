<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin user if not exists
        User::updateOrCreate(['email' => 'admin@example.com'], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
