<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'annafi101@gmail.com'], // cari user berdasar email
            [
                'name' => 'Admin',
                'password' => Hash::make('110101Fahru'),
            ]
        );
    }
}
