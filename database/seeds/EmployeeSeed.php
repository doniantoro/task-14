<?php

use Illuminate\Database\Seeder;

// use App\Employee;
use App\EmployeeInformation;

class EmployeeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker\Factory::create();

        for($i=0 ; $i<8 ; $i++){
        $deposits = new EmployeeInformation();
        $deposits->name = $faker->name;
        $deposits->tittle = $faker->jobTitle;
        $deposits->adress = $faker->address;
        $deposits->phone = $faker->e164PhoneNumber;
        $deposits->paid_leave = 12;
        $deposits->user_id = 10;
        $deposits->save();
            
        }
        $deposits = new EmployeeInformation();
        $deposits->name = "Employee";
        $deposits->tittle = $faker->jobTitle;
        $deposits->adress = $faker->address;
        $deposits->phone = $faker->e164PhoneNumber;
        $deposits->paid_leave = 12;
        $deposits->user_id = 3;
        $deposits->save();
           

        $deposits = new EmployeeInformation();
        $deposits->name = "Employee";
        $deposits->tittle = $faker->jobTitle;
        $deposits->adress = $faker->address;
        $deposits->phone = $faker->e164PhoneNumber;
        $deposits->paid_leave = 12;
        $deposits->user_id = 4;
        $deposits->save();

    }
}
