<?php

namespace App\Enums;

use App\Traits\UseBaseEnum;

enum BasePermissionEnums
{
    use UseBaseEnum;

    // Get Group wise permissions
    static function getGroupWithPermissions(): array
    {

        $permissions = [];
        $files = glob(app_path('Enums/Permissions/*.php'));

        foreach ($files as $file) {
            $className = basename($file, '.php');
            $fullClassName = "App\\Enums\\Permissions\\{$className}";

            if (class_exists($fullClassName)) {
                $name = str_replace('PermissionEnums', '', $className);
                $permissions[] = [
                    'name' => $name,
                    'permissions' => $fullClassName::getValuesWithNames()
                ];
            }
        }

        return $permissions;
    }

    // Get all permissions
    static function getAllPermissionList(): array
    {

        $permissions = [];
        $files = glob(app_path('Enums/Permissions/*.php'));

        foreach ($files as $file) {
            $className = basename($file, '.php');
            $fullClassName = "App\\Enums\\Permissions\\{$className}";

            if (class_exists($fullClassName)) {
                $permissions = array_merge($permissions, $fullClassName::getValues());
            }
        }

        return $permissions;
    }


    // Get Group wise permissions from list
    static function getGroupWithPermissionsFromList(array $permissionList): array
    {
        $allGroupPermissions = self::getGroupWithPermissions();

        $filteredPermissions = [];

        foreach ($allGroupPermissions as $group) {
            $groupPermissions = [];
            foreach ($group['permissions'] as $key => $value) {
                if (in_array($value['id'], $permissionList)) {
                    $groupPermissions[$key] = $value;
                }
            }

            if (!empty($groupPermissions)) {
                $filteredPermissions[] = [
                    'name' => $group['name'],
                    'permissions' => $groupPermissions
                ];
            }
        }

        return $filteredPermissions;
    }
}
