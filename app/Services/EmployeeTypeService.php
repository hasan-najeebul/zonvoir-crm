<?php

namespace App\Services;

use App\Models\EmployeeType;

/**
 * Class EmployeeTypeService.
 */
class EmployeeTypeService
{
    public static function index()
    {
        $employeeTypes = EmployeeType::get();;
        return $employeeTypes;
    }

    public static function store(array $data)
    {
        $employeeType = EmployeeType::create($data);
        return $employeeType;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return EmployeeType::where($columnName, $columnValue)->first();
    }

    public static function update($id, array $data)
    {
        $employeeType = self::getByColumn('id', $id);

        $employeeType->update($data);

        return $employeeType;
    }

    public static function getAll()
    {
        return EmployeeType::get();
    }
}
