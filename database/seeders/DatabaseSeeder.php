<?php

namespace Database\Seeders;

use App\Modules\Authentication\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@digitopia.com',
            'phone' => '01010869000',
            'national_id' => '01234567891234',
            'user_type' => 'ministry_admin',
            'password' => Hash::make('12345678'),
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }
}
