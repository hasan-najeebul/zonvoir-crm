<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

/**
 * Class StaffService.
 */
class UserService
{
    public static function index()
    {
        $users = User::get();
        return $users;
    }

    public static function getRelatedData()
    {
        $data['genders']            = GenderService::getAll();
        $data['employeeTypes']      = EmployeeTypeService::getAll();
        $data['skills']             = SkillService::getAll();
        $data['languages']          = LanguageService::getAll();
        $data['countries']          = CountryService::getAll();
        $data['roles']              = RoleService::getAll();
        $data['departments']        = DepartmentService::getAll();
        $data['resignationStatuses']= ResignationStatusService::getAll();
        return $data;
    }

    public static function store(array $data)
    {
        $data['employee_id']    = self::getEmployeeId();
        $data['profile_image']  = self::getProfileImage($data);

        $filteredData = array_filter($data, function ($value) {
            return $value !== '' && $value !== null;
        });
        $user = User::create($filteredData);

        if(isset($data['skill_ids']) && !empty($data['skill_ids']))
        {
            $user->skills()->attach($data['skill_ids']);
        }
        if(isset($data['language_ids']) && !empty($data['language_ids']))
        {
            $user->languages()->attach($data['language_ids']);
        }

        $user->roles()->attach($data['role_id']);

        return $user;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return User::where($columnName, $columnValue)->first();
    }

    public static function update($id, array $data)
    {
        $user = self::getByColumn('id', $id);

        $data['profile_image'] = self::getProfileImage($data);
        $data['password'] = self::getHashedPassword($data);
        $filteredData = array_filter($data, function ($value) {
            return $value !== '' && $value !== null;
        });
        $user->update($filteredData);

        if(isset($data['skill_ids']) && !empty($data['skill_ids']))
        {
            $user->skills()->sync($data['skill_ids']);
        }
        if(isset($data['language_ids']) && !empty($data['language_ids']))
        {
            $user->languages()->sync($data['language_ids']);
        }

        $user->roles()->sync($data['role_id']);

        return $user;
    }

    public static function getEmployeeId()
    {
        $lastRecord = User::whereNotNull('employee_id')->withTrashed()->latest()->first();
        if($lastRecord && $lastRecord->employee_id!=''){
            $pattern = '/^[a-zA-Z]+-\d+$/';
            if (preg_match($pattern, $lastRecord->employee_id)) {
                $employeeIdArr = explode('-', $lastRecord->employee_id);
                $prefix = $employeeIdArr[0];
                $number = $employeeIdArr[1]+1;

                $employeeId = $prefix.'-'.$number;
            }else{
                $employeeId = self::generteEmployeeId();
            }
        }else{
            $employeeId = self::generteEmployeeId();
        }
        return $employeeId;
    }

    public static function generteEmployeeId()
    {
        $setting = Setting::pluck('value', 'key');
        $prefix = $setting['employee_prefix'];
        $number = $setting['employee_prefix_start'];
        return  $prefix.'-'.$number;
    }

    public static function getProfileImage($data)
    {
        if(isset($data['profile_image']) && $data['profile_image']!=''){
            $profile = $data['profile_image'];
            $fileName = date('Ymdhis').'.'.$profile->getClientOriginalExtension();
            $destinationPath = public_path('images/users/');
            if (! File::exists($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true);
            }
            $profile->move( $destinationPath, $fileName );
            return 'images/users/'.$fileName;
        }
    }

    public static function getHashedPassword($data)
    {
        if(isset($data['password']) && $data['password']!=''){
            return Hash::make($data['password']);
        }
    }
}
