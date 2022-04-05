<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =
        [
            [
                'name' => 'Mr.Fahri',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'role' => 'admin',
                'password' => bcrypt('1234123'),
            ],
            [
                'name' => 'Mrs.lela',
                'email' => 'resepsionis@gmail.com',
                'email_verified_at' => now(),
                'role' => 'resepsionis',
                'password' => bcrypt('1234123'),
            ]

        ];
        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
