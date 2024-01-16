<?php

namespace App\Services;
use App\Models\Source;
/**
 * Class SourceService.
 */
class SourceService
{
    public static function getAll()
    {
        return Source::get();
    }

    public static function store(array $data)
    {
        $source = Source::create($data);
        return $source;
    }

    public static function update($id, array $data)
    {
        $source = self::getByColumn('id', $id);
        $source->update($data);
        return $source;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Source::where($columnName, $columnValue)->first();
    }
}
