<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'avatar.png'
        ]);

        $usersId = DB::table('users')->pluck('id')->toArray();
        DB::table('posts')->insert([
            'body' => Str::random(50),
            'user_id' => Arr::random($usersId)
        ]);
    }
}
