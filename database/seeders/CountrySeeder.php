<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Read JSON file
        $json = File::get(database_path('countries.json'));
        $countries = json_decode($json);

        foreach ($countries as $item) {
            $country = Country::where(['shortname'=>$item->sortname, 'name'=>$item->name])->first();
            if(empty($country)){
                Country::insert(
                    [
                        'shortname' => $item->sortname,
                        'name' => $item->name
                    ]
                );
            }
        }
    }
}
