<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user= User::create([
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => Hash::make('123456789'),
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
       ]);

       $user->givePermissionTo('all');
       $user->assignRole('admin');
       User::factory()->count(100)->create();
    }
}
