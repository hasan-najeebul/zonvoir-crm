<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
/**
 * Class RoleService.
 */
class RoleService
{
    public static function getAll()
    {
       
        return Role::get();
    }

    public static function store()
    {
        return;
    }

    public static function update()
    {
        return;
    }
}
