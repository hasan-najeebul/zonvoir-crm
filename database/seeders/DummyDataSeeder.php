<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CompanyType;
use App\Models\Currency;
use App\Models\Department;
use App\Models\EmployeeType;
use App\Models\Gender;
use App\Models\Language;
use App\Models\ResignationStatus;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Source;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::insert($this->genders());
        EmployeeType::insert($this->employeeTypes());
        Skill::insert($this->skills());
        Language::insert($this->languages());
        Department::insert($this->departments());
        ResignationStatus::insert($this->resignationStatuses());
        Setting::insert($this->settings());
        Category::insert($this->categories());
        CompanyType::insert($this->companyTypes());
        Currency::insert($this->currencies());
        Source::insert($this->sources());
    }

    public function genders(){
        return [
            ['name' => 'Male'],
            ['name' => 'Female'],
            ['name' => 'Others']
        ];
    }

    public function employeeTypes(){
        return [
            ['name' => 'Permanent'],
            ['name' => 'Contract Basis'],
            ['name' => 'Monthly basis'],
            ['name' => 'Project Basis']
        ];
    }

    public function skills(){
        return [
            ['name' => 'Database'],
            ['name' => 'MS Office'],
            ['name' => 'Email'],
            ['name' => 'Programming']
        ];
    }

    public function languages(){
        return [
            ['name' => 'English'],
            ['name' => 'Hindi'],
            ['name' => 'Sindhi'],
            ['name' => 'Punjabi']
        ];
    }

    public function departments(){
        return [
            ['name' => 'Finance'],
            ['name' => 'Marketing'],
            ['name' => 'Design'],
            ['name' => 'Production department']
        ];
    }

    public function resignationStatuses(){
        return [
            ['name' => 'Pending'],
            ['name' => 'Under Negotiation'],
            ['name' => 'Accepted']
        ];
    }

    public function settings(){
        return [
            ['key' => 'employee_prefix', 'value' => 'Zon'],
            ['key' => 'employee_prefix_start', 'value' => '101']
        ];
    }

    public function categories(){
        return [
            ['name' => 'Private','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Public','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Associate','created_at' => Carbon::now(),'updated_at' => Carbon::now()]
        ];
    }

    public function companyTypes(){
        return [
            ['name' => 'Accounts','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'IT','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Car Washing','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'e-Commerce','created_at' => Carbon::now(),'updated_at' => Carbon::now()]
        ];
    }

    public function currencies(){
        return [
                [
                    'currency_name' => 'Rupee',
                    'currency_code' => 'INR',
                    'currency_symbol' => '₹',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'currency_name' => 'Dollars',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'currency_name' => 'Euros',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'currency_name' => 'Pounds',
                    'currency_code' => 'GBP',
                    'currency_symbol' => '£',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
        ];
    }

    public function sources(){
        return [
            ['name' => 'Email','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Facebook','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'LinkedIn','created_at' => Carbon::now(),'updated_at' => Carbon::now()]
        ];
    }
}
