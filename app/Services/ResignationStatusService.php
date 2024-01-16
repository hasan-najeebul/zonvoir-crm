<?php

namespace App\Services;

use App\Models\ResignationStatus;

/**
 * Class ResignationStatusService.
 */
class ResignationStatusService
{
    public static function index()
    {
        return ResignationStatus::get();
    }

    public static function store(array $data)
    {
        return ResignationStatus::create($data);
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return ResignationStatus::where($columnName, $columnValue)->first();
    }

    public static function update($id, array $data)
    {
        $resignationStatus = self::getByColumn('id', $id);

        $resignationStatus->update($data);

        return $resignationStatus;
    }

    public static function getAll()
    {
        return ResignationStatus::get();
    }
}
