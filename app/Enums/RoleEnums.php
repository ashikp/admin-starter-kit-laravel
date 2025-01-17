<?php

namespace App\Enums;

use App\Traits\UseBaseEnum;

enum RoleEnums: string
{
    use UseBaseEnum;

    case ADMIN = 'admin';
    case USER = 'user';
}
