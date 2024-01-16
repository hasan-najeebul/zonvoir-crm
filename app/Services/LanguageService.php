<?php

namespace App\Services;

use App\Models\Language;

/**
 * Class LanguageService.
 */
class LanguageService
{
    public static function index()
    {
        $languages = Language::get();
        return $languages;
    }

    public static function store(array $data)
    {
        $language = Language::create($data);
        return $language;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Language::where($columnName, $columnValue)->first();
    }

    public static function update($id, array $data)
    {
        $language = self::getByColumn('id', $id);

        $language->update($data);

        return $language;
    }

    public static function getAll()
    {
        return Language::get();
    }
}
