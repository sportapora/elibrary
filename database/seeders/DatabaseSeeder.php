<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);

        $user = User::create([
            'username' => 'henryhenn',
            'alamat' => 'Alamat',
            'namaLengkap' => 'Henry',
            'email' => 'henry@email.test',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('Admin');
    }
}
