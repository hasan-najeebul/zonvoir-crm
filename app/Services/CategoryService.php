<?php

namespace App\Services;
use App\Models\Category;
/**
 * Class CategoryService.
 */
class CategoryService
{
    public static function getAll()
    {
        return Category::get();
    }

    public static function store(array $data)
    {
        $category = Category::create($data);
        return $category;
    }

    public static function update($id, array $data)
    {
        $category = self::getByColumn('id', $id);
        $category->update($data);
        return $category;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Category::where($columnName, $columnValue)->first();
    }

}
