<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mimin',
            'email' => 'admin@log.com',
            'password' => Hash::make('password'),
            'phone_number' => '085348862900',
            'avatar' => '',
            'role' => 'admin'
        ]);
        // collect([
        //     [],
        //     [],
        // ])->each(function ($model) {
        //     Model::create($model);
        // });
    }
}
