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
