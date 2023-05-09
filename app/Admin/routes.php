<?php

use App\Admin\Controllers\AdminController;
use App\Admin\Controllers\AuthController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Slowlyo\OwlAdmin\Controllers;
use App\Admin\Controllers\HomeController;
use App\Admin\Controllers\SettingController;
use App\Admin\Controllers\UserController;

Route::group([
    'domain'     => config('admin.route.domain'),
    'prefix'     => config('admin.route.prefix'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->post('login', [AuthController::class, 'login']);

    $router->resource('index/index', HomeController::class);
    $router->resource('index/product', HomeProductController::class);

    $router->resource('user/manage', UserController::class);
    // $router->resource('user/level', UserController::class);
    // $router->resource('user/group', UserController::class);
    // $router->resource('user/label', UserController::class);


    // 重写权限路由
    $router->group(['prefix' => 'setting'], function ($router) {
        $router->get('/', [Controllers\AdminUserController::class, 'index']);
        // 管理员
        $router->resource('admin/users', AdminController::class);
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

