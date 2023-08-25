<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userdata = [
            [
                'name' => 'fauzi',
                'email' => 'fauzi@gmail.com',
                'role' => 'author',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin')
            ],
        ];

        foreach ($userdata as $key => $val) {
            User::create($val);
        }
    }
}
