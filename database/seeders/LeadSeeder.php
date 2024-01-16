<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lead;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Lead::insert([
            'hash' => 'sample_hash',
            'name' => 'John Doe',
            'title' => 'CEO',
            'company' => 'Sample Company',
            'description' => 'This is a sample lead description.',
            'country' => 1,
            'zip' => '12345',
            'city' => 'Sample City',
            'state' => 'Sample State',
            'address' => '123 Sample Street',
            'assigned' => 1,
            'dateadded' => now(),
            'from_form_id' => 1,
            'status' => 1,
            'source' => 1,
            // 'lastcontact' => now(),
            'dateassigned' => now(),
            'last_status_change' => now(),
            'addedfrom' => 1,
            'email' => 'john.doe@example.com',
            'website' => 'http://www.example.com',
            'leadorder' => 1,
            'phonenumber' => '123-456-7890',
            'date_converted' => now(),
            'lost' => 0,
            'junk' => 0,
            'last_lead_status' => 1,
            'is_imported_from_email_integration' => 0,
            'email_integration_uid' => 'sample_uid',
            'is_public' => 1,
            'default_language' => 'en',
            'client_id' => 1,
            'lead_value' => 1000.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
