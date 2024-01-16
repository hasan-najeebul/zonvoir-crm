<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::insert($this->contacts());
    }

    public function contacts()
    {
        return [
            [
                'customer_id' => '1',
                'first_name' => 'First',
                'last_name' => 'Contact',
                'position_in_company' => 'Team Lead',
                'email' => 'tl@zonvoir.com',
                'contact_number' => '9026522948',
                'primary_contact' => 0,
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->addSecond(),
                'updated_at' => Carbon::now()->addSecond()
            ],
            [
                'customer_id' => '1',
                'first_name' => 'Second',
                'last_name' => 'Contact',
                'position_in_company' => 'HR',
                'email' => 'hr@zonvoir.com',
                'contact_number' => '9026522948',
                'primary_contact' => 0,
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->addSecond(),
                'updated_at' => Carbon::now()->addSecond()
            ]
        ];
    }
}
