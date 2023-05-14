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
use Illuminate\Validation\Rule;
use Slowlyo\OwlAdmin\Renderers\Action;
use Slowlyo\OwlAdmin\Renderers\Button;
use Slowlyo\OwlAdmin\Renderers\Container;
use Slowlyo\OwlAdmin\Renderers\Dialog;
use Slowlyo\OwlAdmin\Renderers\DialogAction;
use Slowlyo\OwlAdmin\Renderers\Drawer;
use Slowlyo\OwlAdmin\Renderers\DrawerAction;
use Slowlyo\OwlAdmin\Renderers\Grid;
use Slowlyo\OwlAdmin\Renderers\GroupControl;
use Slowlyo\OwlAdmin\Renderers\ImageControl;
use Slowlyo\OwlAdmin\Renderers\LinkAction;
use Slowlyo\OwlAdmin\Renderers\Operation;
use Slowlyo\OwlAdmin\Renderers\SelectControl;
use Slowlyo\OwlAdmin\Renderers\Tabs;
use Slowlyo\OwlAdmin\Renderers\TextareaControl;
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
                    ->onEvent([
                        'cancel' => [
                            'actions' => [
                                ['actionType' => 'hidden', 'componentId' => 'edit-form'],
                                ['actionType' => 'show', 'componentId' => 'show-form'],
                                ['actionType' => 'show', 'componentId' => 'edit-btn'],
                                ['actionType' => 'hidden', 'componentId' => 'cancel-btn'],
                                ['actionType' => 'hidden', 'componentId' => 'submit-btn'],
                            ]
                        ]
                    ])
            );
        } else {
            $button = LinkAction::make()->link($this->getShowPath());
        }

        return $button->label(('查看'))->icon('fa-regular fa-eye')->level('link');
    }

    public function form(): Form
    {
        return $this->baseForm()
            ->api($this->getUpdatePath())
            ->title()
            ->initApi($this->getEditGetDataPath())
            ->id('edit-form')
            ->mode('horizontal')
            ->hidden(true)
            ->persistData('1')
            ->clearPersistDataAfterSubmit('1')
            ->wrapWithPanel(false)
            ->autoFocus(true)
            ->messages([
                'saveSuccess' => '保存成功',
            ])
            ->onEvent([
                'submitSucc' => [
                    'actions' => [
                        ['actionType' => 'show', 'componentId' => 'show-form'],
                        ['actionType' => 'hidden', 'componentId' => 'cancel-btn'],
                        ['actionType' => 'hidden', 'componentId' => 'submit-btn'],
                        ['actionType' => 'show', 'componentId' => 'edit-btn'],
                        ['actionType' => 'hidden', 'componentId' => 'edit-form'],
                    ]
                ]
            ])
            ->body([
                amis('group')->body([
                    Tpl::make()->tpl('基本信息')->className('font-bold block border-solid border-0 border-l-4 border-primary pl-4')
                ]),
                amis('group')->body([
                    amis('input-text')->label('用户ID:')->name('id')->readOnly(true),
                    amis('input-text')->label('姓名:')->name('name')
                        ->validateOnChange(true)
                        ->validations([
                            'maxLength' => '32',
                        ])->required('1'),
                ])->className('my-2'),
                amis('group')->body([
                    amis('input-text')->label('手机号码:')->name('phone')
                        ->validateOnChange('1')
                        ->required('1')
                        ->validations(['isPhoneNumber' => '1',]),
                    amis('input-date')->label('生日:')->name('birthday')
                        ->format('YYYY-MM-DD')
                        ->validateOnChange('1')
                        ->minDate('-100years')
                        ->maxDate('+0days'),
                ])->className('my-2'),
                amis('group')->body([
                    amis('input-text')->label('身份证号:')->name('card_id')
                        ->validateOnChange('1')
                        ->validations(['isId' => '1',]),
                    amis('input-text')->label('用户地址:')->name('address'),
                ])->className('my-2'),
                amis('group')->body([
                    amis('divider')
                ]),
                amis('group')->body([
                    Tpl::make()->tpl('基本信息')->className('font-bold block border-solid border-0 border-l-4 border-primary pl-4')
                ])->className('my-2'),
                amis('group')->body([
                    amis('input-password')->label('密码:')->name('password')->placeholder('不输入默认不修改密码')
                        ->validations([
                            'minLength' => '6',
                            'maxLength' => '32',
                        ])
                        ->validateOnChange(1),
                    amis('input-password')->label('重复密码:')->name('password_confirmation')->placeholder('不输入默认不修改密码')
                        ->validations([
                            'minLength' => '6',
                            'maxLength' => '32',
                            'equalsField' => 'password',
                        ])
                        ->validateOnChange(1),
                ])->className('my-2'),
                amis('group')->body([
                    amis('divider')->className('my-2'),
                ]),
                amis('group')->body([
                    Tpl::make()->tpl('用户概况')->className('font-bold block border-solid border-0 border-l-4 border-primary pl-4')
                ])->className('my-2'),
                amis('group')->body([
                    amis('select')->label('用户等级')->name('level')
                        ->options([
                            ['label' => 'V1', 'value' => 1],
                            ['label' => 'V2', 'value' => 2],
                            ['label' => 'V3', 'value' => 3],
                            ['label' => 'V4', 'value' => 4],
                            ['label' => 'V5', 'value' => 5],
                        ]),
                    amis('select')->label('用户分组')->name('user_group.name')
                        ->label('用户分组')
                        ->name('user_group.name')
                        ->labelField('name')
                        ->valueField('id')
                        ->placeholder('请选择用户分组')
                        ->options(UserGroupService::make()->query()->get(['id', 'name'])),
                ])->className('my-2'),
                amis('group')->body([
                    amis('select')->label('用户标签')->name('label_id'), // todo 标签
                ])->className('my-2'),
                amis('group')->body([
                    amis('switch')->label('推广资格')->name('is_spread'),
                ])->className('my-2'),
                amis('group')->body([
                    amis('switch')->label('推广权限')->name('is_promoter'),
                ])->className('my-2'),
                amis('group')->body([
                    amis('switch')->label('用户状态')->name('state'),
                ])->className('my-2'),
                amis('group')->body([
                    amis('divider')->className('my-2'),
                ]),
                amis('group')->body([
                    Tpl::make()->tpl('用户备注')->className('font-bold block border-solid border-0 border-l-4 border-primary pl-4')
                ])->className('my-2'),
                amis('group')->body([
                    amis('textarea')->label('备注')->name('mark'),
                ])->className('my-2'),
                amis('group')->body([
                    amis('divider'),
                ])->className('my-2'),
            ]);
    }



    public function showForm()
    {
        return $this->baseForm()
            ->wrapWithPanel(false)
            ->initApi($this->getShowGetDataPath())
            ->title()
            ->mode('horizontal')
            ->id('show-form')
            ->static(true)
            ->submitText()
            ->body([
                amis('grid')->columns([
                    [Tpl::make()->tpl('基本信息')->className('font-bold block border-solid border-0 border-l-4 border-primary pl-4')]
                ])->className('my-2'),
                amis('grid')->columns([
                    [amis('input-text')->label('用户ID:')->name('id')],
                    [amis('input-text')->label('姓名:')->name('name')],
                    [amis('input-text')->label('手机号码:')->name('phone')],
                ])->className('my-1'),
                amis('grid')->columns([
                    [amis('input-text')->label('生日:')->name('birthday')->inputFormat('YYYY-MM-DD')],
                    [TextControl::make()->label('身份证号:')->name('card_id')],
                    [TextControl::make()->label('用户地址:')->name('address')],
                ])->className('my-1'),
                amis('divider')->className('my-2'),
                amis('grid')->columns([
                    [Tpl::make()->tpl('密码')->className('font-bold block border-solid border-0 border-l-4 border-primary pl-4')]
                ])->className('my-2'),
                amis('grid')->columns([
                    [amis('input-text')->label('密码:')->name('password')->value('********')],
                ])->className('my-1'),
                amis('divider')->className('my-2'),
                amis('grid')->columns([
                    [Tpl::make()->tpl('用户概况')->className('font-bold block border-solid border-0 border-l-4 border-primary pl-4')]
                ])->className('my-2'),
                amis('grid')->columns([
                    [TextControl::make()->label('推广资格:')->name('is_spread')],
                    [amis('switch')->label('用户状态:')->name('state')],
                    [TextControl::make()->label('用户等级:')->name('level')],
                ])->className('my-1'),
                amis('grid')->columns([
                    [TextControl::make()->label('用户标签:')->name('label_id')], //todo 用户标签
                    [TextControl::make()->label('用户分组:')->name('user_group.name')],
                    [TextControl::make()->label('推广人:')->name('spread_user:name')],
                ])->className('my-1'),
                amis('grid')->columns([
                    [TextControl::make()->label('注册时间:')->name('created_at')],
                    [TextControl::make()->label('登录时间:')->name('last_time')],
                    [],
                ])->className('my-1'),
                amis('divider')->className('my-2'),
                amis('grid')->columns([
                    [Tpl::make()->tpl('用户备注')->className('font-bold block border-solid border-0 border-l-4 border-primary pl-4')]
                ])->className('my-2'),
                amis('grid')->columns([
                    [TextareaControl::make()->label('备注:')->name('mark')],
                ])->className('my-1'),
                amis('divider')->className('my-2'),
            ])
            ->mode('inline');
    }

    public function detail()
    {
        return $this->basePage()
            ->data($this->getShowPath())
            ->body([
                Container::make()->body(
                    [Grid::make()->columns([
                        ['body' => [amis('image')->src('${avatar}')], 'md' => 'auto',],
                        ['body' => [
                            Grid::make()->columns([
                                ['body' => [Tpl::make()->tpl('${name}')->inline('1')]],
                            ])->className('my-1'),
                            Grid::make()->columns([
                                ['body' => [Tpl::make()->tpl('余额: ${money}')->inline('1')]],
                                ['body' => [Tpl::make()->tpl('总计订单: ${total-order}')->inline('1')->wrapperComponent('')->id('u:3e36d8861f49'),], 'id' => 'u:cf71f9587a3f',],
                                ['body' => [Tpl::make()->tpl('总消费金额: ${total-expense}')->inline('1')->wrapperComponent('')->id('u:b5cac074e9a1'),], 'id' => 'u:71008ba6ae36',],
                            ])->className('my-1'),
                            Grid::make()->columns([
                                ['body' => [Tpl::make()->tpl('积分: ${integral}')->inline('1')], 'id' => 'u:812cb7706911',],
                                ['body' => [Tpl::make()->tpl('本月订单: ${month-order}')->inline('1')->wrapperComponent('')->id('u:80a1dd94912d'),], 'id' => 'u:0f33644d2af9',],
                                ['body' => [Tpl::make()->tpl('本月消费金额: ${month-expense}')->inline('1')->wrapperComponent('')->id('u:25388228cf03'),], 'id' => 'u:3a2f5f52be8e',],
                            ])->className('my-1')
                        ]],
                    ])]
                )->style(['position' => 'static', 'display' => 'block',])->wrapperBody('')->id('u:a463a6c561f3'),
                Tabs::make()
                    ->id('tabs')
                    ->tabs([
                        ['title' => '用户信息', 'body' => [
                            $this->showForm(),
                            $this->form(),
                            Action::make()->label('取消')
                                ->type('button')
                                ->level('danger')
                                ->id('cancel-btn')
                                ->hidden(true)
                                ->className('m-2')
                                ->onEvent([
                                    'click' => [
                                        'actions' => [
                                            ['actionType' => 'hidden', 'componentId' => 'cancel-btn'],
                                            ['actionType' => 'show', 'componentId' => 'show-form'],
                                            ['actionType' => 'hidden', 'componentId' => 'edit-form'],
                                            ['actionType' => 'hidden', 'componentId' => 'submit-btn'],
                                            ['actionType' => 'show', 'componentId' => 'edit-btn']
                                        ]
                                    ],
                                ])
                                ->className('float-right mt-4 mr-4'),
                            Action::make()->label('保存')
                                ->type('button')
                                ->id('submit-btn')
                                ->level('primary')
                                ->hidden(true)
                                ->className('m-2')
                                ->onEvent([
                                    'click' => [
                                        'actions' => [
                                            ['actionType' => 'submit', 'componentId' => 'edit-form'],
                                        ],
                                    ]
                                ])
                                ->className('float-right mt-4 mr-4'),
                            Action::make()->label('编辑')
                                ->type('button')
                                ->level('primary')
                                ->id('edit-btn')
                                ->onEvent([
                                    'click' => [
                                        'actions' => [
                                            ['actionType' => 'hidden', 'componentId' => 'show-form'],
                                            ['actionType' => 'show', 'componentId' => 'edit-form'],
                                            ['actionType' => 'show', 'componentId' => 'cancel-btn'],
                                            ['actionType' => 'show', 'componentId' => 'submit-btn'],
                                            ['actionType' => 'hidden', 'componentId' => 'edit-btn']
                                        ]
                                    ],
                                ])
                                ->className('float-right mt-4'),
                        ]],
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
            'birthday' => 'date|nullable|after:100 years ago|before:today',
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
            return $this->response()->fail($validator->errors()->first());
        }
        return $this->autoResponse($this->service->store($request));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'avatar' => 'string|nullable|max:255',
            // 'username' => 'required|string|unique:users|max:32',
            'password' => 'nullable|confirmed|max:32',
            'name' => 'required|string|max:16',
            'phone' => ['required', new PhoneRule],
            'birthday' => 'date|nullable',
            'card_id' => ['string', 'nullable', new IdCardRule],
            'address' => 'string|max:255|nullable',
            'email' => 'email|nullable',
            'mark' => 'string|max:255|nullable',
            'level' => 'integer|nullable',
            'group_id' => 'integer|nullable',
            // 'label_id' => 'array|nullable',//todo
            'is_spread' => 'boolean|nullable',
            'is_promoter' => 'boolean|nullable',
            'state' => 'boolean|nullable',
            'money' => 'decimal:2|nullable',
            'money_status' => 'boolean|nullable',
            'id' => [
                'required',
                Rule::unique('users')->ignore($request->id),
            ]
        ]);
        if ($validator->fails()) {
            return $this->response()->fail($validator->errors()->first());
        }
        return $this->autoResponse($this->service->updateNew($request));
    }

    public function show($id)
    {
        return $this->response()->success($this->service->getDetail($id));
    }

    public function edit($id)
    {
        return $this->response()->success($this->service->getEditDataNew($id));
    }


}
