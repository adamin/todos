<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {
        // Wipe the table clean before populating
        DB::table('users')->delete();

        $users = array(
            ['id' => 1, 'name' => 'admin', 'email' => 'admin@example.com', 'password' => Hash::make('admin'), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'user', 'email' => 'user@example.com', 'password' => Hash::make('user'), 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('users')->insert($users);
    }

}
