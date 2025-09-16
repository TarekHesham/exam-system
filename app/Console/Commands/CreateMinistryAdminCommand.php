<?php

namespace App\Console\Commands;

use App\Modules\Authentication\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateMinistryAdminCommand extends Command
{
    protected $signature = 'user:create-admin 
                            {name : Admin name}
                            {email : Admin email}
                            {phone : Admin phone}
                            {national_id : Admin national ID}
                            {password : Admin password}';

    protected $description = 'Create a new ministry admin user';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $phone = $this->argument('phone');
        $nationalId = $this->argument('national_id');
        $password = $this->argument('password');

        // Check if email already exists
        if (User::where('email', $email)->exists()) {
            $this->error('Email already exists!');
            return 1;
        }

        // Check if phone already exists
        if (User::where('phone', $phone)->exists()) {
            $this->error('Phone already exists!');
            return 1;
        }

        // Check if national_id already exists
        if (User::where('national_id', $nationalId)->exists()) {
            $this->error('National ID already exists!');
            return 1;
        }

        try {
            $admin = User::create([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'national_id' => $nationalId,
                'user_type' => 'ministry_admin',
                'password' => Hash::make($password),
                'is_active' => true,
                'email_verified_at' => now(),
            ]);

            $this->info("Ministry admin created successfully!");
            $this->info("ID: {$admin->id}");
            $this->info("Name: {$admin->name}");
            $this->info("Email: {$admin->email}");
            $this->info("Phone: {$admin->phone}");

            return 0;
        } catch (\Exception $e) {
            $this->error("Failed to create admin: " . $e->getMessage());
            return 1;
        }
    }
}
