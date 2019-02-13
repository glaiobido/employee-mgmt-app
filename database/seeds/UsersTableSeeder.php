<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->firstname = 'Test';
        $user->lasttname = 'User';
        $user->username = 'TestUser';
        $user->email = 'testuser@test.com';
        $user->password = Hash::make('123123');
        $user->save();
    }
}
