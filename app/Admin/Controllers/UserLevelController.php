<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\UserLevelService;

/**
 * @property UserLevelService $service
 */
class UserLevelController extends AdminController
{
    protected string $serviceName = UserLevelService::class;

    public function list(): Page
    {
        $crud = $this->baseCRUD()
            ->filterTogglable(false)
            ->headerToolbar([
                $this->createButton(true),
                ...$this->baseHeaderToolBar(),
            ])
            ->columns([
                TableColumn::make()->name('id')->label('ID')->sortable(),
				TableColumn::make()->name('user_id')->label('1'),
				TableColumn::make()->name('level_id')->label('1'),
				TableColumn::make()->name('grade')->label('1'),
				TableColumn::make()->name('valid_time')->label('1'),
				TableColumn::make()->name('is_forever')->label('1'),
				TableColumn::make()->name('mer_id')->label('1'),
				TableColumn::make()->name('state')->label('1'),
				TableColumn::make()->name('mark')->label('1'),
				TableColumn::make()->name('remind')->label('1'),
				TableColumn::make()->name('discount')->label('1'),
				TableColumn::make()->name('created_at')->label(__('admin.created_at'))->type('datetime')->sortable(true),
				TableColumn::make()->name('updated_at')->label(__('admin.updated_at'))->type('datetime')->sortable(true),
                $this->rowActions(true),
            ]);

        return $this->baseList($crud);
    }

    public function form(): Form
    {
        return $this->baseForm()->body([
            TextControl::make()->name('user_id')->label('1'),
			TextControl::make()->name('level_id')->label('1'),
			TextControl::make()->name('grade')->label('1'),
			TextControl::make()->name('valid_time')->label('1'),
			TextControl::make()->name('is_forever')->label('1'),
			TextControl::make()->name('mer_id')->label('1'),
			TextControl::make()->name('state')->label('1'),
			TextControl::make()->name('mark')->label('1'),
			TextControl::make()->name('remind')->label('1'),
			TextControl::make()->name('discount')->label('1'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static()->name('id')->label('ID'),
			TextControl::make()->static()->name('user_id')->label('1'),
			TextControl::make()->static()->name('level_id')->label('1'),
			TextControl::make()->static()->name('grade')->label('1'),
			TextControl::make()->static()->name('valid_time')->label('1'),
			TextControl::make()->static()->name('is_forever')->label('1'),
			TextControl::make()->static()->name('mer_id')->label('1'),
			TextControl::make()->static()->name('state')->label('1'),
			TextControl::make()->static()->name('mark')->label('1'),
			TextControl::make()->static()->name('remind')->label('1'),
			TextControl::make()->static()->name('discount')->label('1'),
			TextControl::make()->static()->name('created_at')->label(__('admin.created_at')),
			TextControl::make()->static()->name('updated_at')->label(__('admin.updated_at'))
        ]);
    }
}
