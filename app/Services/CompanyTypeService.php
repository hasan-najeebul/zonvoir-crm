<?php

namespace App\Services;
use App\Models\CompanyType;

/**
 * Class CompanyTypeService.
 */
class CompanyTypeService
{
    public static function getAll()
    {
        return CompanyType::get();
    }

    public static function store(array $data)
    {
        $companyType = CompanyType::create($data);
        return $companyType;
    }

    public static function update($id, array $data)
    {
        $companyType = self::getByColumn('id', $id);
        $companyType->update($data);
        return $companyType;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return CompanyType::where($columnName, $columnValue)->first();
    }
}
