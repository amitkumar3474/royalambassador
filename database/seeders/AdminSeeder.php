<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create Admin User
        $user = User::create([
            'name'     => 'Admin',
            'email'         =>  'admin@admin.com',
            'password'      =>  Hash::make('Admin@123#'),
        ]);
    }
}
