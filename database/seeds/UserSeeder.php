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
            'name' => 'test222',
            'email' => 'test222@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test222'),
        ]);
    }
}
