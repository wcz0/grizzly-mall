<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Slowlyo\OwlAdmin\Controllers;

Route::group([
    'domain'     => config('admin.route.domain'),
    'prefix'     => config('admin.route.prefix'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->resource('dashboard', \App\Admin\Controllers\HomeController::class);

    $router->resource('setting/settings', \App\Admin\Controllers\SettingController::class);

    
    $router->group(['prefix' => 'setting'], function (\Illuminate\Routing\Router $router) {
        $router->get('/', [Controllers\AdminUserController::class, 'index']);
        // 管理员
        $router->resource('admin/users', Controllers\AdminUserController::class);
        // 菜单
        $router->resource('admin/menus', Controllers\AdminMenuController::class);
        // 快速编辑
        $router->post('admin_menu_quick_save', [Controllers\AdminMenuController::class, 'quickEdit']);
        // 角色保存权限
        $router->post('admin_role_save_permissions', [Controllers\AdminRoleController::class, 'savePermissions']);
        // 角色
        $router->resource('admin/roles', Controllers\AdminRoleController::class);
        // 权限
        $router->resource('admin/permissions', Controllers\AdminPermissionController::class);

        $router->post('_admin_permissions_auto_generate', [
            Controllers\AdminPermissionController::class,
            'autoGenerate',
        ]);
    });
});

