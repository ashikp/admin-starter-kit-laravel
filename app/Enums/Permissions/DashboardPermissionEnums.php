<?php

namespace App\Enums\Permissions;

use App\Traits\UseBaseEnum;

enum DashboardPermissionEnums: string
{
    use UseBaseEnum;

    case VIEW = 'view:dashboard';
}
