<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DummyDataSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(LeadSeeder::class);

    }
}
