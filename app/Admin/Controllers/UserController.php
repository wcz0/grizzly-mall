<?php

namespace App\Admin\Controllers;

use App\Services\UserGroupService;
use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\UserService;
use Slowlyo\OwlAdmin\Renderers\Button;
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
                        $this->form()
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
            TextControl::make()->name('username')->label('用户名')->required(true),
            TextControl::make()->name('password')->label('姓名')->required(true),
            TextControl::make()->name('real_name')->label('手机号码')->required(true),
            amis('input-date')->name('birthday')->label('生日'),
            TextControl::make()->name('card_id')->label('身份证号'),
            TextControl::make()->name('address')->label('用户地址'),
            TextControl::make()->name('mark')->label('用户备注'),
            amis('input-password')->name('password')->label('登录密码')->required(true),
            amis('input-password')->name('confirm_password')->label('确认密码')->required(true),
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
            amis('switch')->name('spread_open')->label('推广资格')->trueValue(1)->falseValue(0),
            amis('switch')->name('is_promoter')->label('推广权限')->trueValue(1)->falseValue(0),
            amis('switch')->name('state')->label('用户状态')->trueValue(1)->falseValue(0),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static(true)->name('id')->label('ID'),
            TextControl::make()->static(true)->name('username')->label('Username'),
            TextControl::make()->static(true)->name('password')->label('Password'),
            TextControl::make()->static(true)->name('real_name')->label('RealName'),
            TextControl::make()->static(true)->name('birthday')->label('Birthday'),
            TextControl::make()->static(true)->name('card_id')->label('CardId'),
            TextControl::make()->static(true)->name('mark')->label('Mark'),
            TextControl::make()->static(true)->name('parther_id')->label('PartherId'),
            TextControl::make()->static(true)->name('group_id')->label('GroupId'),
            TextControl::make()->static(true)->name('nickname')->label('Nickname'),
            TextControl::make()->static(true)->name('avatar')->label('Avatar'),
            TextControl::make()->static(true)->name('phone')->label('Phone'),
            TextControl::make()->static(true)->name('add_ip')->label('AddIp'),
            TextControl::make()->static(true)->name('last_time')->label('LastTime'),
            TextControl::make()->static(true)->name('last_ip')->label('LastIp'),
            TextControl::make()->static(true)->name('money')->label('Money'),
            TextControl::make()->static(true)->name('brokerage_price')->label('BrokeragePrice'),
            TextControl::make()->static(true)->name('integral')->label('Integral'),
            TextControl::make()->static(true)->name('exp')->label('Exp'),
            TextControl::make()->static(true)->name('sign_num')->label('SignNum'),
            TextControl::make()->static(true)->name('status')->label('Status'),
            TextControl::make()->static(true)->name('level')->label('Level'),
            TextControl::make()->static(true)->name('agent_level')->label('AgentLevel'),
            TextControl::make()->static(true)->name('spread_open')->label('SpreadOpen'),
            TextControl::make()->static(true)->name('spread_uid')->label('SpreadUid'),
            TextControl::make()->static(true)->name('spread_time')->label('SpreadTime'),
            TextControl::make()->static(true)->name('user_type')->label('UserType'),
            TextControl::make()->static(true)->name('is_promoter')->label('IsPromoter'),
            TextControl::make()->static(true)->name('pay_count')->label('PayCount'),
            TextControl::make()->static(true)->name('spread_count')->label('SpreadCount'),
            TextControl::make()->static(true)->name('clean_time')->label('CleanTime'),
            TextControl::make()->static(true)->name('addres')->label('Addres'),
            TextControl::make()->static(true)->name('admin_id')->label('AdminId'),
            TextControl::make()->static(true)->name('login_type')->label('LoginType'),
            TextControl::make()->static(true)->name('record_phone')->label('RecordPhone'),
            TextControl::make()->static(true)->name('is_money_level')->label('IsMoneyLevel'),
            TextControl::make()->static(true)->name('is_ever_level')->label('IsEverLevel'),
            TextControl::make()->static(true)->name('overdue_time')->label('OverdueTime'),
            TextControl::make()->static(true)->name('division_type')->label('DivisionType'),
            TextControl::make()->static(true)->name('division_status')->label('DivisionStatus'),
            TextControl::make()->static(true)->name('is_division')->label('IsDivision'),
            TextControl::make()->static(true)->name('is_agent')->label('IsAgent'),
            TextControl::make()->static(true)->name('is_staff')->label('IsStaff'),
            TextControl::make()->static(true)->name('division_id')->label('DivisionId'),
            TextControl::make()->static(true)->name('agent_id')->label('AgentId'),
            TextControl::make()->static(true)->name('staff_id')->label('StaffId'),
            TextControl::make()->static(true)->name('division_percent')->label('DivisionPercent'),
            TextControl::make()->static(true)->name('division_change')->label('DivisionChange'),
            TextControl::make()->static(true)->name('division_end_time')->label('DivisionEndTime'),
            TextControl::make()->static(true)->name('division_invite')->label('DivisionInvite'),
            TextControl::make()->static(true)->name('created_at')->label('创建时间'),
            TextControl::make()->static(true)->name('updated_at')->label('更新时间')
        ]);
    }


    public function manage()
    {
        return 'asdasd';
    }
}
