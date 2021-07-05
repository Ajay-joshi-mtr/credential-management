<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Integer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'eid' => '101',
            'name' => 'aakansha',
            'role' => 'admin',
            'email' =>'aakansha@gmail.com',
            'phone' => 98674746,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
