<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\SystemUserLevelService;

/**
 * @property SystemUserLevelService $service
 */
class SystemUserLevelController extends AdminController
{
    protected string $serviceName = SystemUserLevelService::class;

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
				TableColumn::make()->name('mer_id')->label('1'),
				TableColumn::make()->name('name')->label('1'),
				TableColumn::make()->name('money')->label('1'),
				TableColumn::make()->name('valid_date')->label('1'),
				TableColumn::make()->name('is_fprever')->label('1'),
				TableColumn::make()->name('is_pay')->label('1'),
				TableColumn::make()->name('state')->label('1'),
				TableColumn::make()->name('grade')->label('1'),
				TableColumn::make()->name('discount')->label('1'),
				TableColumn::make()->name('image')->label('1'),
				TableColumn::make()->name('icon')->label('1'),
				TableColumn::make()->name('explain')->label('1'),
				TableColumn::make()->name('exp')->label('1')->sortable(true),
				TableColumn::make()->name('created_at')->label(__('admin.created_at'))->type('datetime')->sortable(true),
				TableColumn::make()->name('updated_at')->label(__('admin.updated_at'))->type('datetime')->sortable(true),
                $this->rowActions(true),
            ]);

        return $this->baseList($crud);
    }

    public function form(): Form
    {
        return $this->baseForm()->body([
            TextControl::make()->name('mer_id')->label('1'),
			TextControl::make()->name('name')->label('1'),
			TextControl::make()->name('money')->label('1'),
			TextControl::make()->name('valid_date')->label('1'),
			TextControl::make()->name('is_fprever')->label('1'),
			TextControl::make()->name('is_pay')->label('1'),
			TextControl::make()->name('state')->label('1'),
			TextControl::make()->name('grade')->label('1'),
			TextControl::make()->name('discount')->label('1'),
			TextControl::make()->name('image')->label('1'),
			TextControl::make()->name('icon')->label('1'),
			TextControl::make()->name('explain')->label('1'),
			TextControl::make()->name('exp')->label('1'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static()->name('id')->label('ID'),
			TextControl::make()->static()->name('mer_id')->label('1'),
			TextControl::make()->static()->name('name')->label('1'),
			TextControl::make()->static()->name('money')->label('1'),
			TextControl::make()->static()->name('valid_date')->label('1'),
			TextControl::make()->static()->name('is_fprever')->label('1'),
			TextControl::make()->static()->name('is_pay')->label('1'),
			TextControl::make()->static()->name('state')->label('1'),
			TextControl::make()->static()->name('grade')->label('1'),
			TextControl::make()->static()->name('discount')->label('1'),
			TextControl::make()->static()->name('image')->label('1'),
			TextControl::make()->static()->name('icon')->label('1'),
			TextControl::make()->static()->name('explain')->label('1'),
			TextControl::make()->static()->name('exp')->label('1'),
			TextControl::make()->static()->name('created_at')->label(__('admin.created_at')),
			TextControl::make()->static()->name('updated_at')->label(__('admin.updated_at'))
        ]);
    }
}
