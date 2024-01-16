<?php

namespace App\Services;

use App\Models\Gender;

/**
 * Class GenderService.
 */
class GenderService
{
    public static function index()
    {
        $genders = Gender::get();
        return $genders;
    }

    public static function store(array $data)
    {
        $gender = Gender::create($data);
        return $gender;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Gender::where($columnName, $columnValue)->first();
    }

    public static function update($id, array $data)
    {
        $gender = self::getByColumn('id', $id);

        $gender->update($data);

        return $gender;
    }

    public static function getAll()
    {
        return Gender::get();
    }
}
