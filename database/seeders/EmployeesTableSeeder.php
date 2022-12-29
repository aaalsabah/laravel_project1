<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee;
        $employee->firstName = "Femployee1";
        $employee->lastName = "Lemployee2";
        $employee->company = "1";
        $employee->email = "employee1@hotmail.com";
        $employee->phone = "059784541";
        $employee->save();
    }
}
