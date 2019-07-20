<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->username = "user";
        $user->full_name = "User 1";
        $user->password = \Hash::make("123456");
        $user->level = "USER";

        $user->save();

        $this->command->info("User created");
    }
}
