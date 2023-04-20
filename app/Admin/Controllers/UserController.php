<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\UserService;

/**
 * @property UserService $service
 */
class UserController extends AdminController
{
    protected string $serviceName = UserService::class;

    public function list(): Page
    {
        $crud = $this->baseCRUD()
            ->filterTogglable(false)
            ->headerToolbar([
                $this->createButton(true),
                ...$this->baseHeaderToolBar(),
            ])
            ->columns([
                TableColumn::make()->name('id')->label('ID')->sortable(true),
				TableColumn::make()->name('username')->label('Username'),
				TableColumn::make()->name('password')->label('Password'),
				TableColumn::make()->name('real_name')->label('RealName'),
				TableColumn::make()->name('birthday')->label('Birthday'),
				TableColumn::make()->name('card_id')->label('CardId'),
				TableColumn::make()->name('mark')->label('Mark'),
				TableColumn::make()->name('parther_id')->label('PartherId'),
				TableColumn::make()->name('group_id')->label('GroupId'),
				TableColumn::make()->name('nickname')->label('Nickname'),
				TableColumn::make()->name('avatar')->label('Avatar'),
				TableColumn::make()->name('phone')->label('Phone'),
				TableColumn::make()->name('add_ip')->label('AddIp'),
				TableColumn::make()->name('last_time')->label('LastTime'),
				TableColumn::make()->name('last_ip')->label('LastIp'),
				TableColumn::make()->name('money')->label('Money'),
				TableColumn::make()->name('brokerage_price')->label('BrokeragePrice'),
				TableColumn::make()->name('integral')->label('Integral'),
				TableColumn::make()->name('exp')->label('Exp'),
				TableColumn::make()->name('sign_num')->label('SignNum'),
				TableColumn::make()->name('status')->label('Status'),
				TableColumn::make()->name('level')->label('Level'),
				TableColumn::make()->name('agent_level')->label('AgentLevel'),
				TableColumn::make()->name('spread_open')->label('SpreadOpen'),
				TableColumn::make()->name('spread_uid')->label('SpreadUid'),
				TableColumn::make()->name('spread_time')->label('SpreadTime'),
				TableColumn::make()->name('user_type')->label('UserType'),
				TableColumn::make()->name('is_promoter')->label('IsPromoter'),
				TableColumn::make()->name('pay_count')->label('PayCount'),
				TableColumn::make()->name('spread_count')->label('SpreadCount'),
				TableColumn::make()->name('clean_time')->label('CleanTime'),
				TableColumn::make()->name('addres')->label('Addres'),
				TableColumn::make()->name('admin_id')->label('AdminId'),
				TableColumn::make()->name('login_type')->label('LoginType'),
				TableColumn::make()->name('record_phone')->label('RecordPhone'),
				TableColumn::make()->name('is_money_level')->label('IsMoneyLevel'),
				TableColumn::make()->name('is_ever_level')->label('IsEverLevel'),
				TableColumn::make()->name('overdue_time')->label('OverdueTime'),
				TableColumn::make()->name('division_type')->label('DivisionType'),
				TableColumn::make()->name('division_status')->label('DivisionStatus'),
				TableColumn::make()->name('is_division')->label('IsDivision'),
				TableColumn::make()->name('is_agent')->label('IsAgent'),
				TableColumn::make()->name('is_staff')->label('IsStaff'),
				TableColumn::make()->name('division_id')->label('DivisionId'),
				TableColumn::make()->name('agent_id')->label('AgentId'),
				TableColumn::make()->name('staff_id')->label('StaffId'),
				TableColumn::make()->name('division_percent')->label('DivisionPercent'),
				TableColumn::make()->name('division_change')->label('DivisionChange'),
				TableColumn::make()->name('division_end_time')->label('DivisionEndTime'),
				TableColumn::make()->name('division_invite')->label('DivisionInvite'),
				TableColumn::make()->name('created_at')->label('创建时间')->type('datetime')->sortable(true),
				TableColumn::make()->name('updated_at')->label('更新时间')->type('datetime')->sortable(true),
                $this->rowActions(true),
            ]);

        return $this->baseList($crud);
    }

    public function form(): Form
    {
        return $this->baseForm()->body([
            TextControl::make()->name('username')->label('Username'),
			TextControl::make()->name('password')->label('Password'),
			TextControl::make()->name('real_name')->label('RealName'),
			TextControl::make()->name('birthday')->label('Birthday'),
			TextControl::make()->name('card_id')->label('CardId'),
			TextControl::make()->name('mark')->label('Mark'),
			TextControl::make()->name('parther_id')->label('PartherId'),
			TextControl::make()->name('group_id')->label('GroupId'),
			TextControl::make()->name('nickname')->label('Nickname'),
			TextControl::make()->name('avatar')->label('Avatar'),
			TextControl::make()->name('phone')->label('Phone'),
			TextControl::make()->name('add_ip')->label('AddIp'),
			TextControl::make()->name('last_time')->label('LastTime'),
			TextControl::make()->name('last_ip')->label('LastIp'),
			TextControl::make()->name('money')->label('Money'),
			TextControl::make()->name('brokerage_price')->label('BrokeragePrice'),
			TextControl::make()->name('integral')->label('Integral'),
			TextControl::make()->name('exp')->label('Exp'),
			TextControl::make()->name('sign_num')->label('SignNum'),
			TextControl::make()->name('status')->label('Status'),
			TextControl::make()->name('level')->label('Level'),
			TextControl::make()->name('agent_level')->label('AgentLevel'),
			TextControl::make()->name('spread_open')->label('SpreadOpen'),
			TextControl::make()->name('spread_uid')->label('SpreadUid'),
			TextControl::make()->name('spread_time')->label('SpreadTime'),
			TextControl::make()->name('user_type')->label('UserType'),
			TextControl::make()->name('is_promoter')->label('IsPromoter'),
			TextControl::make()->name('pay_count')->label('PayCount'),
			TextControl::make()->name('spread_count')->label('SpreadCount'),
			TextControl::make()->name('clean_time')->label('CleanTime'),
			TextControl::make()->name('addres')->label('Addres'),
			TextControl::make()->name('admin_id')->label('AdminId'),
			TextControl::make()->name('login_type')->label('LoginType'),
			TextControl::make()->name('record_phone')->label('RecordPhone'),
			TextControl::make()->name('is_money_level')->label('IsMoneyLevel'),
			TextControl::make()->name('is_ever_level')->label('IsEverLevel'),
			TextControl::make()->name('overdue_time')->label('OverdueTime'),
			TextControl::make()->name('division_type')->label('DivisionType'),
			TextControl::make()->name('division_status')->label('DivisionStatus'),
			TextControl::make()->name('is_division')->label('IsDivision'),
			TextControl::make()->name('is_agent')->label('IsAgent'),
			TextControl::make()->name('is_staff')->label('IsStaff'),
			TextControl::make()->name('division_id')->label('DivisionId'),
			TextControl::make()->name('agent_id')->label('AgentId'),
			TextControl::make()->name('staff_id')->label('StaffId'),
			TextControl::make()->name('division_percent')->label('DivisionPercent'),
			TextControl::make()->name('division_change')->label('DivisionChange'),
			TextControl::make()->name('division_end_time')->label('DivisionEndTime'),
			TextControl::make()->name('division_invite')->label('DivisionInvite'),
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
}
