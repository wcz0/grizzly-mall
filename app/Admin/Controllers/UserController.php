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
use Slowlyo\OwlAdmin\Renderers\Container;
use Slowlyo\OwlAdmin\Renderers\Dialog;
use Slowlyo\OwlAdmin\Renderers\DialogAction;
use Slowlyo\OwlAdmin\Renderers\Drawer;
use Slowlyo\OwlAdmin\Renderers\DrawerAction;
use Slowlyo\OwlAdmin\Renderers\ImageControl;
use Slowlyo\OwlAdmin\Renderers\LinkAction;
use Slowlyo\OwlAdmin\Renderers\Operation;
use Slowlyo\OwlAdmin\Renderers\SelectControl;
use Slowlyo\OwlAdmin\Renderers\Tabs;
use Slowlyo\OwlAdmin\Renderers\Tpl;
use Slowlyo\OwlAdmin\Renderers\VanillaAction;

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
                TableColumn::make()->name('name')->label('姓名'),
                TableColumn::make()->name('member_level')->label('付费会员')->type('status'),
                TableColumn::make()->name('level')->label('用户等级'),
                TableColumn::make()->name('user_group.name')->label('分组'),
                TableColumn::make()->name('phone')->label('手机号'),
                TableColumn::make()->name('user_type')->label('用户类型'),
                TableColumn::make()->name('money')->label('余额'),

                $this->rowActions(true, 1000),
            ]);

        return $this->baseList($crud);
    }

    protected function rowActions(bool $drawer = false, $size = 0): Operation
    {
        return Operation::make()->label('操作')->buttons([
            $this->rowShowButtonDrawer($drawer, $size),
            // $this->rowEditButton($dialog, $dialogSize),
            $this->rowDeleteButton(),
        ]);
    }


    public function rowShowButtonDrawer(bool $drawer = false, $size = 0)
    {
        if ($drawer) {
            $button = DrawerAction::make()->drawer(
                Drawer::make()->title('用户详情')->body($this->detail())
                    ->width($size)
                    ->showCloseButton(false)
                    ->closeOnOutside(true)
                    ->actions()
            );
        } else {
            $button = LinkAction::make()->link($this->getShowPath());
        }

        return $button->label(('查看'))->icon('fa-regular fa-eye')->level('link');
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


    public function edit($id): Form
    {
        $this->isEdit = true;

        if ($this->actionOfGetData()) {
            return $this->response()->success();
        }

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
        return $this->baseForm()
            ->api($this->getStorePath())
            ->data($this->getShowPath())->initApi($this->getShowGetDataPath())
            ->body([
                Container::make()->isFreeContainer('1')->size('xs')->body(
                    [
                        amis('image')->src('${avatar}')->id('u:f6e4bcc28647')->style(['position' => 'absolute', 'inset' => '10px auto auto 10px',]),
                        Tpl::make()->tpl('${name}')->inline('')->wrapperComponent('')->id('u:52b92e8d759a')->style(['position' => 'absolute', 'inset' => '22px auto auto 149px',]),
                        TextControl::make()->label('余额:')->name('money')->id('u:bdab0486cccf')->style(['position' => 'absolute', 'inset' => '65px auto auto 152px',])->originPosition('left-top')->readOnly('1')->static('1')->mode('inline'),
                        TextControl::make()->label('积分:')->name('integral')->id('u:f4f5e9216c7f')->style(['position' => 'absolute', 'inset' => '124px auto auto 151px',])->originPosition('left-top')->mode('inline')->static('1'),
                        TextControl::make()->label('总消费金额:')->name('total-expense')->id('u:bc58c4261e70')->style(['position' => 'absolute', 'inset' => '71px auto auto 475px',])->originPosition('left-top')->static('1')->mode('inline'),
                        TextControl::make()->label('总计订单:')->name('order-total')->id('u:3cf8e78ef193')->style(['position' => 'absolute', 'inset' => '66px auto auto 288px',])->mode('inline')->originPosition('left-top')->static('1'),
                        TextControl::make()->label('本月订单:')->name('order-month')->id('u:798b6c986159')->style(['position' => 'absolute', 'inset' => '130px auto auto 287px',])->originPosition('left-top')->static('1')->mode('inline'),
                        TextControl::make()->label('本月消费金额:')->name('month-expense')->id('u:2fb7a81a2fcd')->style(['position' => 'absolute', 'inset' => '133px auto auto 476px',])->mode('inline')->static('1')->originPosition('left-top'),
                    ]
                )->wrapperBody('')->style(['position' => 'relative', 'minHeight' => '200px',])->id('u:e33a0066701a'),
                Tabs::make()->tabs([
                    ['title' => '用户信息', 'body' => [
                        Form::make()->title('表单')->body(
                            [
                                Tpl::make()->tpl('基本信息')->inline('')->wrapperComponent('')->id('u:384a6d3c6251'),
                                TextControl::make()->label('用户id')->name('id')->id('u:b71e14f65e0e')->mode('inline')->static('')->readOnly('1'),
                                TextControl::make()->label('姓名')->name('name')->id('u:06a1adfda5cb')->static('')->validations(['maxLength' => '32',])->required('1'),
                                TextControl::make()->label('手机号码')->name('phone')->id('u:2833e49f8538')->validateOnChange('1')->required('1')->validations(['isPhoneNumber' => '1',])->static(''),
                                TextControl::make()->label('文本')->name('text')->id('u:20019e153c26')->mode('horizontal')->size('sm'),
                            ]
                        )->api(['url' => 'gm.local', 'method' => 'get',])->mode('inline')->id('u:d3c00e7ba77a')->wrapWithPanel('')->persistData('1')->clearPersistDataAfterSubmit('1'),
                    ], 'id' => 'u:abab894324c7',],
                    ['title' => '消费记录', 'body' => [
                        Tpl::make()->tpl('内容2')->wrapperComponent('')->inline('')->id('u:9c015c70b296'),
                    ], 'id' => 'u:59251888f5f1',],
                    ['title' => '积分明细', 'body' => [
                        Tpl::make()->tpl('内容')->inline('')->id('u:2301c5b878d1'),
                    ], 'id' => 'u:c9d2b8796e07',],
                    ['title' => '签到记录', 'body' => [
                        Tpl::make()->tpl('内容')->inline(''),
                    ],],
                    ['title' => '持有优惠券', 'body' => [
                        Tpl::make()->tpl('内容')->inline(''),
                    ],],
                    ['title' => '余额变动', 'body' => [
                        Tpl::make()->tpl('内容')->inline(''),
                    ],],
                    ['title' => '好友关系', 'body' => [
                        Tpl::make()->tpl('内容')->inline(''),
                    ],],
                ])->id('u:2f03a1d6c574')->toolbar([])->hidden('')->mountOnEnter('1')->tabsMode('')->showTip(''),
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
        return $this->autoResponse($this->service->store($request));
    }

    public function show($id)
    {
        return $this->response()->success($this->service->getDetail($id));
    }
}
