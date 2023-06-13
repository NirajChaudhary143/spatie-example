<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        
        $adminRole = Role::findByName('admin');
        $admin->assignRole($adminRole);
        
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        
        $userRole = Role::findByName('user');
        $user->assignRole($userRole);
        
        $writer = User::create([
            'name' => 'writer',
            'email' => 'writer@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        
        $writerRole = Role::findByName('writer');
        $writer->assignRole($writerRole);
    }
}
