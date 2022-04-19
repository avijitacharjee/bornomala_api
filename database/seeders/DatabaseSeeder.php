<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'email_verified_at' => now(),
                'password' => 'password'
            ],
            // [
            //     'phone' => '01111111112',
            //     'email' => 'police1@mail.com',
            //     'email_verified_at' => now(),
            //     'role' => 1,
            // ],

            // [
            //     'phone' => '01111111113',
            //     'email' => 'owner1@mail.com',
            //     'email_verified_at' => now(),
            //     'role' => 2,
            // ],
            // [
            //     'phone' => '01111111114',
            //     'email' => 'hotel1@mail.com',
            //     'email_verified_at' => now(),
            //     'role' => 3,
            // ],
        ];

        // foreach ($users as $user) {
        //     User::create(array(
        //         'name' => $user['name'],
        //         'email' => $user['email'],
        //         'email_verified_at' => now(),
        //         'password' => bcrypt('password'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ));
        // }
    }
}
