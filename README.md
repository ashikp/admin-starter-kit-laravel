# Role and Permission System

## Overview

The application implements a robust Role-Based Access Control (RBAC) system using roles and permissions. Each user is assigned a role, and each role can have multiple permissions. This system helps manage access control throughout the application.

## Core Components

### 1. Roles
- Roles are defined in the `roles` table
- Each role can have multiple permissions
- Default roles: Admin and User
- Managed through `App\Models\Role`

### 2. Permissions
- Permissions are stored in the `permissions` table
- Permissions are grouped by feature/module
- Defined using PHP enums in `App\Enums\Permissions\*`
- Format: `module:action` (e.g., `user:create`, `role:view`)

### Permissions Create Command
```bash
php artisan make:permission
```

### Usage Code Example
```php

<?php

namespace App\Http\Controllers;

use App\Enums\Permissions\DashboardPermissionEnums;
use Illuminate\Routing\Controllers\HasMiddleware;
use Inertia\Inertia;

class DashboardController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            checkPermission(DashboardPermissionEnums::VIEW, only: ['index']),
        ];
    }

    public function index()
    {
        return Inertia::render('Dashboard');
    }
}

```
