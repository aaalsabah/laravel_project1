<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company;
        $company->name = "company1";
        $company->email = "company@hotmail.com";
        $company->logo = "company1.logo";
        $company->website = "company1.website";
        $company->save();
    }
}

