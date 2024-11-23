<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Employee::create([
            'first_name'   => 'Mostafa',
            'last_name'    => 'Saadoun',
            'email'        => 'mostafa@gmail.com',
            'password'     => '123456',
            'phone'        => '01014324321',
            'is_manager'      => true,
            'department_id'=> 1
        ]);

        Employee::create([
            'first_name'   => 'Mona',
            'last_name'    => 'Saadoun',
            'email'        => 'Mona@gmail.com',
            'password'     => '123456',
            'phone'        => '01214324321',
            'department_id'=> 1,
            'manager_id'   => 1
        ]);


        Employee::create([
            'first_name'   => 'Menna',
            'last_name'    => 'Saadoun',
            'email'        => 'Menna@gmail.com',
            'password'     => '123456',
            'phone'        => '01514324321',
            'department_id'=> 1,
            'manager_id'   => 1
        ]);
    }
}
