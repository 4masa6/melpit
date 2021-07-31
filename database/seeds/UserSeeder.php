<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'test111',
            'email' => 'test111@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test111'),
        ]);
        factory(User::class)->create([
            'name' => 'test222',
            'email' => 'test222@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test222'),
        ]);
        factory(User::class)->create([
            'name' => 'test333',
            'email' => 'test333@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test333'),
        ]);
        factory(User::class)->create([
            'name' => 'test444',
            'email' => 'test444@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test444'),
        ]);
        factory(User::class)->create([
            'name' => 'test555',
            'email' => 'test555@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test555'),
        ]);
    }
}
