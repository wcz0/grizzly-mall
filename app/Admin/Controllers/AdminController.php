<?php

namespace App\Admin\Controllers;

use App\Services\AdminService;
use Slowlyo\OwlAdmin\Controllers\AdminUserController;
use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\SwitchControl;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Renderers\ImageControl;
use Slowlyo\OwlAdmin\Renderers\Operation;
use Slowlyo\OwlAdmin\Renderers\SelectControl;
use Slowlyo\OwlAdmin\Renderers\Tag;
use Slowlyo\OwlAdmin\Services\AdminRoleService;

/**
 * @property AdminService $service
 */
class AdminController extends AdminUserController
{
	protected string $serviceName = AdminService::class;

    public function list(): Page
    {
        $crud = $this->baseCRUD()
            ->headerToolbar([
                $this->createButton(true),
                'bulkActions',
                amis('reload')->align('right'),
                amis('filter-toggler')->align('right'),
            ])
            ->filter($this->baseFilter()->body(
                TextControl::make()
                    ->name('keyword')
                    ->label(__('admin.keyword'))
                    ->size('md')
                    ->placeholder(__('admin.admin_user.search_username'))
            ))
            ->columns([
                TableColumn::make()->label('ID')->name('id')->sortable(true),
                TableColumn::make()->label(__('admin.admin_user.avatar'))->name('avatar')->type('avatar')->src('${avatar}'),
                TableColumn::make()->label(__('admin.username'))->name('username'),
                TableColumn::make()->label(__('admin.admin_user.name'))->name('name'),
                TableColumn::make()->label(__('admin.admin_user.roles'))->name('roles')->type('each')->items(
                    Tag::make()->label('${name}')->className('my-1')
                ),
				TableColumn::make()->label('最后登录时间')->name('last_time')->type('datetime')->sortable(true),
				TableColumn::make()->label('最后登录IP')->name('last_ip'),
				TableColumn::make()->label('状态')->name('state')->type('switch')->value('${state}'),
                TableColumn::make()->label(__('admin.created_at'))->name('created_at')->type('datetime')->sortable(true),
                Operation::make()->label(__('admin.actions'))->buttons([
                    $this->rowEditButton(true),
                    $this->rowDeleteButton()->visibleOn('${id != 1}'),
                ]),
            ]);

        return $this->baseList($crud);
    }

    public function form(): Form
    {
        return $this->baseForm()->body([
            ImageControl::make()
                ->label(__('admin.admin_user.avatar'))
                ->name('avatar')
                ->receiver($this->uploadImagePath()),
            TextControl::make()->label(__('admin.username'))->name('username')->required(true),
            TextControl::make()->label(__('admin.admin_user.name'))->name('name')->required(true),
            TextControl::make()->type('input-password')->label(__('admin.password'))->name('password'),
            TextControl::make()
                ->type('input-password')
                ->label(__('admin.confirm_password'))
                ->name('confirm_password'),
            
            SelectControl::make()
                ->name('roles')
                ->label(__('admin.admin_user.roles'))
                ->searchable(true)
                ->multiple(true)
                ->labelField('name')
                ->valueField('id')
                ->joinValues(false)
                ->extractValue(true)
                ->options(AdminRoleService::make()->query()->get(['id', 'name'])),
            amis('input-text')->name('level')->label('级别'),
            // todo division_id
            amis('switch')->name('state')->label('状态')->value('${state}'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([]);
    }

    public function edit($id)
    {
        $this->isEdit = true;

        if ($this->actionOfGetData()) {
            return $this->response()->success($this->service->getEditDataNew($id));
        }

        $form = amisMake()
            ->Card()
            ->className('base-form')
            ->header(['title' => __('admin.edit')])
            ->toolbar([$this->backButton()])
            ->body(
                $this->form(true)->api($this->getUpdatePath())->initApi($this->getEditGetDataPath())
            );

        $page = $this->basePage()->body($form);

        return $this->response()->success($page);
    }

}
