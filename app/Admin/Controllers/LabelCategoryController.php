<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\LabelCategoryService;

/**
 * @property LabelCategoryService $service
 */
class LabelCategoryController extends AdminController
{
    protected string $serviceName = LabelCategoryService::class;

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
				TableColumn::make()->name('parent_id')->label('ParentId'),
				TableColumn::make()->name('owner_user')->label('OwnerUser'),
				TableColumn::make()->name('name')->label('Name'),
				TableColumn::make()->name('sort')->label('Sort'),
				TableColumn::make()->name('type')->label('Type'),
				TableColumn::make()->name('created_at')->label(__('admin.created_at'))->type('datetime')->sortable(true),
				TableColumn::make()->name('updated_at')->label(__('admin.updated_at'))->type('datetime')->sortable(true),
                $this->rowActions(true),
            ]);

        return $this->baseList($crud);
    }

    public function form(): Form
    {
        return $this->baseForm()->body([
            TextControl::make()->name('parent_id')->label('ParentId'),
			TextControl::make()->name('owner_user')->label('OwnerUser'),
			TextControl::make()->name('name')->label('Name'),
			TextControl::make()->name('sort')->label('Sort'),
			TextControl::make()->name('type')->label('Type'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static()->name('id')->label('ID'),
			TextControl::make()->static()->name('parent_id')->label('ParentId'),
			TextControl::make()->static()->name('owner_user')->label('OwnerUser'),
			TextControl::make()->static()->name('name')->label('Name'),
			TextControl::make()->static()->name('sort')->label('Sort'),
			TextControl::make()->static()->name('type')->label('Type'),
			TextControl::make()->static()->name('created_at')->label(__('admin.created_at')),
			TextControl::make()->static()->name('updated_at')->label(__('admin.updated_at'))
        ]);
    }
}
