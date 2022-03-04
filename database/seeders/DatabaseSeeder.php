<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'role'=>'admin',
            'password' => Hash::make('dimafil1903'),
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
