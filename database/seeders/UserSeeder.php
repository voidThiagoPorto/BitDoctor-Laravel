<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(50)
            ->create();
        DB::table('users')->insert([
            'id' => 1,
            'nome' => "João Marcos",
            'email' => 'joao2009@gmail.com',
            'password' => Hash::make('senha'),
            'isAdmin' => 0
        ]);
    }
}
