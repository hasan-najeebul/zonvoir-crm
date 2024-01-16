<?php

namespace Database\Seeders;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::insert($this->customers());
        $customer = Customer::findOrFail(1);
        $customer->languages()->attach([1,2,3,4]);
    }

    public function customers(){
        return [
            [
                'company_information' => 'Zonvoir Technology | Your Partner for Custom Web Development, Mobile Apps, E-commerce, SEO and CRM Solutions. Our Expertise in Web, Apps, and More',
                'customer_type' => 'Person',
                'company_name' => 'Zonvoir Technologies',
                'vat_number' => '',
                'gst_number' => '',
                'official_contact_no' => '9555784545',
                'email' => 'rejesh@zonvoir.com',
                'website' => 'www.zonvoir.com',
                'source_id' => 1,
                'company_type_id' => 3,
                'category_id' => 1,
                'currency_id' => 2,
                'address' => 'Gomti Nagar, Lucknow',
                'country_id' => 1,
                'state' => 'Uttar Pradesh',
                'city' => 'Lucknow',
                'zipcode' => '002122',
                'billing_address' => 'Gomti Nagar, Lucknow',
                'billing_city' => 'Lucknow',
                'billing_state' => 'Uttar Pradesh',
                'billing_zip' => '002122',
                'billing_country' => 1,
                'shipping_address' => 'Gomti Nagar, Lucknow',
                'shipping_city' => 'Lucknow',
                'shipping_state' => 'Uttar Pradesh',
                'shipping_zip' => '002122',
                'shipping_country' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [   'company_information' => 'Google LLC is an American multinational technology company focusing on artificial intelligence, online advertising, search engine technology',
                'customer_type' => 'Organisation',
                'company_name' => 'Google',
                'vat_number' => '123456789MVA',
                'gst_number' => '29GGGGG1314R9Z6',
                'official_contact_no' => '7845784521',
                'email' => 'prem@zonvoir.com',
                'website' => 'www.google.com',
                'source_id' => 2,
                'company_type_id' => 2,
                'category_id' => 3,
                'currency_id' => 1,
                'address' => 'Menlo Park,United State',
                'country_id' => 2,
                'state' => 'California',
                'city' => 'California',
                'zipcode' => '002121',
                'billing_address' => 'Menlo Park,United State',
                'billing_city' => 'California',
                'billing_state' => 'New York',
                'billing_zip' => '002121',
                'billing_country' => 2,
                'shipping_address' => 'Menlo Park,United State',
                'shipping_city' => 'California',
                'shipping_state' => 'New York',
                'shipping_zip' => '002121',
                'shipping_country' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'company_information' => 'Microsoft Corporation is an American multinational technology corporation headquartered in Redmond, Washington. Microsofts best-known software products are the Windows line of operating systems',
                'customer_type' => 'Organisation',
                'company_name' => 'Microsoft',
                'vat_number' => '321456789MBA',
                'gst_number' => '29JIKGG1314R9Z6',
                'official_contact_no' => '6555784521',
                'email' => 'chandan@zonvoir.com',
                'website' => 'www.microsoft.com',
                'source_id' => 3,
                'company_type_id' => 1,
                'category_id' => 2,
                'currency_id' => 3,
                'address' => 'Redmond,United State',
                'country_id' => 1,
                'state' => 'Washington',
                'city' => 'Washington',
                'zipcode' => '002122',
                'billing_address' => 'Redmond,United State',
                'billing_city' => 'Washington',
                'billing_state' => 'Washington',
                'billing_zip' => '002122',
                'billing_country' => 1,
                'shipping_address' => 'Redmond,United State',
                'shipping_city' => 'Washington',
                'shipping_state' => 'Washington',
                'shipping_zip' => '002122',
                'shipping_country' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ];
    }
}
