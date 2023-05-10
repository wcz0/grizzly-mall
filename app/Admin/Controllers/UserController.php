<?php

namespace App\Admin\Controllers;

use App\Rules\IdCardRule;
use App\Rules\PhoneRule;
use App\Services\UserGroupService;
use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Slowlyo\OwlAdmin\Renderers\SelectControl;

/**
 * @property UserService $service
 */
class UserController extends AdminController
{
    protected string $serviceName = UserService::class;

    public function list(): Page
    {
        $sendCouponBtn = amis('action')
            ->label('发放优惠券')->actionType('dialog')->dialog(
                amis('dialog')->title('发放优惠券')->body(
                    amis('form')->controls([
                        amis('text')->name('coupon_id')->label('优惠券id'),
                        amis('text')->name('user_id')->label('用户id'),
                    ])
                )
            );

        $setGroupBtn = amis('action')
            ->label('批量设置分组')->actionType('dialog')->dialog(
                amis('dialog')->title('设置用户分组')->body()
            );

        $createBtn = amis('action')
            ->icon('fa fa-add')->level('primary')
            ->label('添加用户')->actionType('drawer')->drawer(
                amis('drawer')
                    ->title('用户信息填写')
                    ->width(750)
                    ->body(
                        $this->form()->api($this->getStorePath())
                    )
            );


        $crud = $this->baseCRUD()
            ->filterTogglable(true)
            ->headerToolbar([
                $createBtn,
                // ...$this->baseHeaderToolBar(),
                amis('reload')->align('right'),
                // amis('filter-toggler')->align('right'),
                $sendCouponBtn,
                amis('export-excel'),
            ])
            // ->filter($this->baseFilter()->body(
            //     amis('text')->name('username')->label('用户名'),
            // ))
            // ->autoGenerateFilter()
            ->columns([
                TableColumn::make()->name('id')->label('用户id')->sortable(true),
                TableColumn::make()->name('username')->label('用户名'),
                TableColumn::make()->name('real_name')->label('姓名'),
                TableColumn::make()->name('is_money_level')->label('付费会员')->type('status'),
                TableColumn::make()->name('card_id')->label('用户等级'),
                TableColumn::make()->name('mark')->label('分组'),
                TableColumn::make()->name('phone')->label('手机号'),
                TableColumn::make()->name('group_id')->label('用户类型'),
                TableColumn::make()->name('nickname')->label('余额'),

                $this->rowActions(true),
            ]);

        return $this->baseList($crud);
    }



    public function form(): Form
    {
        return $this->baseForm()->body([
            amis('input-image')->label('头像')->name('avatar')->receiver($this->uploadImagePath()),
            TextControl::make()->name('username')->label('用户名')->required(true)->validateOnChange(true),
            TextControl::make()->name('name')->label('姓名')->required(true)->validateOnChange(true),
            TextControl::make()->name('phone')->label('手机号码')->required(true)->validations([
                'isPhoneNumber' => true,
            ])->validateOnChange(true),
            amis('input-date')->name('birthday')->label('生日'),
            TextControl::make()->name('card_id')->label('身份证号')->validations([
                'isId' => true,
            ]),
            TextControl::make()->name('address')->label('用户地址'),
            amis('input-email')->name('email')->label('用户邮箱')->validateOnChange(true),
            TextControl::make()->name('mark')->label('用户备注'),
            amis('input-password')->name('password')->label('登录密码')->required(true)->validations([
                'minLength' => 6,
            ])->validateOnChange(true),
            amis('input-password')->name('password_confirmation')->label('确认密码')->required(true)->validations([
                'minLength' => 6,
                'equalsField' => 'password',
            ])->validateOnChange(true),
            amis('select')->name('level')->label('用户等级')
                ->options([
                    1 => 'V1',
                    2 => 'V2',
                    3 => 'V3',
                    4 => 'V4',
                    5 => 'V5',
                ]),
            SelectControl::make()
                ->name('group_id')
                ->label('用户分组')
                // ->searchable(true)
                ->labelField('name')
                ->valueField('id')
                ->joinValues(false)
                ->extractValue(true)
                ->options(UserGroupService::make()->query()->get(['id', 'name'])),
            SelectControl::make()
                ->name('label_id')
                ->label('用户标签')
                // ->searchable(true)
                ->labelField('name')
                ->valueField('id')
                ->joinValues(false)
                ->extractValue(true)
                ->multiple(true)
                ->selectMode('group')
                // todo: 获取标签列表
                ->options(),
            amis('switch')->name('spread_open')->label('推广资格')->trueValue(1)->falseValue(0)->value('${spread_open}'),
            amis('switch')->name('is_promoter')->label('推广权限')->trueValue(1)->falseValue(0)->value('${is_promoter}'),
            amis('switch')->name('state')->label('用户状态')->trueValue(1)->falseValue(0)->value('${state}'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            amis('input-image')->label('头像')->name('avatar')->receiver($this->uploadImagePath()),
            TextControl::make()->name('username')->label('用户名')->required(true)->validateOnChange(true),
            TextControl::make()->name('name')->label('姓名')->required(true)->validateOnChange(true),
            TextControl::make()->name('phone')->label('手机号码')->required(true)->validations([
                'isPhoneNumber' => true,
            ])->validateOnChange(true),
            amis('input-date')->name('birthday')->label('生日'),
            TextControl::make()->name('card_id')->label('身份证号')->validations([
                'isId' => true,
            ]),
            TextControl::make()->name('address')->label('用户地址'),
            amis('input-email')->name('email')->label('用户邮箱')->validateOnChange(true),
            TextControl::make()->name('mark')->label('用户备注'),
            amis('input-password')->name('password')->label('登录密码')->required(true)->validations([
                'minLength' => 6,
            ])->validateOnChange(true),
            amis('input-password')->name('password_confirmation')->label('确认密码')->required(true)->validations([
                'minLength' => 6,
                'equalsField' => 'password',
            ])->validateOnChange(true),
            amis('select')->name('level')->label('用户等级')
                ->options([
                    1 => 'V1',
                    2 => 'V2',
                    3 => 'V3',
                    4 => 'V4',
                    5 => 'V5',
                ]),
            SelectControl::make()
                ->name('group_id')
                ->label('用户分组')
                // ->searchable(true)
                ->labelField('name')
                ->valueField('id')
                ->joinValues(false)
                ->extractValue(true)
                ->options(UserGroupService::make()->query()->get(['id', 'name'])),
            SelectControl::make()
                ->name('label_id')
                ->label('用户标签')
                // ->searchable(true)
                ->labelField('name')
                ->valueField('id')
                ->joinValues(false)
                ->extractValue(true)
                ->multiple(true)
                ->selectMode('group')
                // todo: 获取标签列表
                ->options(),
            amis('switch')->name('spread_open')->label('推广资格')->trueValue(1)->falseValue(0)->value('${spread_open}'),
            amis('switch')->name('is_promoter')->label('推广权限')->trueValue(1)->falseValue(0)->value('${is_promoter}'),
            amis('switch')->name('state')->label('用户状态')->trueValue(1)->falseValue(0)->value('${state}'),
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'string|nullable|max:255',
            'username' => 'required|string|unique:users|max:32',
            'password' => 'required|confirmed|max:32',
            'name' => 'required|string|max:16',
            'phone' => ['required', new PhoneRule],
            'birthday' => 'date|nullable',
            'card_id' => ['string', 'nullable', new IdCardRule],
            'address' => 'string|max:255|nullable',
            'email' => 'email|nullable',
            'mark' => 'string|max:255|nullable',
            'level' => 'integer|nullable',
            'group_id' => 'integer|nullable',
            'label_id' => 'array|nullable',
            'spread_open' => 'boolean|nullable',
            'is_promoter' => 'boolean|nullable',
            'state' => 'boolean|nullable',
        ]);
        if ($validator->fails()) {
            return $this->response()->fail($validator->errors());
        }
        return $this->autoResponse($this->service->store($request->all()));
    }
}
