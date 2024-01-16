<?php

namespace App\Services;

use App\Models\Department;

/**
 * Class DepartmentService.
 */
class DepartmentService
{
    public static function index()
    {
        return Department::get();
    }

    public static function store(array $data)
    {
        return Department::create($data);
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Department::where($columnName, $columnValue)->first();
    }

    public static function update($id, array $data)
    {
        $department = self::getByColumn('id', $id);

        $department->update($data);

        return $department;
    }

    public static function getAll()
    {
        return Department::get();
    }
}
