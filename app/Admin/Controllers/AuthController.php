<?php

namespace App\Admin\Controllers;

use App\Models\AdminUser;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Slowlyo\OwlAdmin\Controllers\AuthController as AdminAuthController;

class AuthController extends AdminAuthController
{
    public function login(Request $request)
    {
        if (config('admin.auth.login_captcha')) {
            if (!$request->has('captcha')) {
                return $this->response()->fail(__('admin.required', ['attribute' => __('admin.captcha')]));
            }

            if (strtolower(admin_decode($request->sys_captcha)) != strtolower($request->captcha)) {
                return $this->response()->fail(__('admin.captcha_error'));
            }
        }

        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required',
            ], [
                'username' . '.required' => __('admin.required', ['attribute' => __('admin.username')]),
                'password.required'      => __('admin.required', ['attribute' => __('admin.password')]),
            ]);

            if ($validator->fails()) {
                abort(Response::HTTP_BAD_REQUEST, $validator->errors()->first());
            }
            $adminModel = config("admin.auth.model", AdminUser::class);
            $user       = $adminModel::query()->where('username', $request->username)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                $token = $user->createToken('admin')->plainTextToken;
                AdminUser::where('id', $user->id)
                    ->update([
                        'last_ip'   => $request->getClientIp(),
                        'last_time' => now(),
                        'login_count'     => DB::raw('login_count + 1'),
                    ]);
                return $this->response()->success(compact('token'), __('admin.login_successful'));
            }

            abort(Response::HTTP_BAD_REQUEST, __('admin.login_failed'));
        } catch (\Exception $e) {
            return $this->response()->fail($e->getMessage());
        }
    }
}
