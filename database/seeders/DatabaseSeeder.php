<?php

namespace Database\Seeders;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Joel Pantoe Jr',
            'email' => 'joelpantoejr@gmail.com',
            'password' => Hash::make('P@55w0rd'),
        ]);
    }
}
