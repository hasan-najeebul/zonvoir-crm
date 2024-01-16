<?php

namespace App\Services;

use App\Models\Skill;

/**
 * Class SkillService.
 */
class SkillService
{
    public static function index()
    {
        $skills = Skill::get();
        return $skills;
    }

    public static function store(array $data)
    {
        $skill = Skill::create($data);
        return $skill;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Skill::where($columnName, $columnValue)->first();
    }

    public static function update($id, array $data)
    {
        $skill = self::getByColumn('id', $id);

        $skill->update($data);

        return $skill;
    }

    public static function getAll()
    {
        return Skill::get();
    }
}
