<?php

namespace App\Services;

use App\Models\Country;
use Illuminate\Support\Str;

/**
 * Class CountryService.
 */
class CountryService
{
    public static function index()
    {
        return Country::orderBy('name')->paginate(10);
    }

    public static function store(array $data)
    {
        return Country::create($data);
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Country::where($columnName, $columnValue)->first();
    }

    public static function update($id, array $data)
    {
        $country = self::getByColumn('id', $id);
        $country->update($data);
        return $country;
    }

    public static function getAll()
    {
        return Country::get();
    }
}
