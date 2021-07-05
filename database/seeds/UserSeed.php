<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Super Admin";
        $user->email = "superadmin@gmail.com";
        $user->password = Hash::make("doni123");
        $user->role = "1";
        $user->save();
        
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("doni123");
        $user->role = "2";
        $user->save();

        for($i=1 ; $i<8 ; $i++){
        $user = new User;
        $user->name = "Employee";
        $user->email = "employee".$i."@gmail.com";
        $user->password = Hash::make("doni123");
        $user->role = 3;
        $user->save();
        }

    }
}
