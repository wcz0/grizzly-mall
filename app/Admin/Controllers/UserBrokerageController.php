<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\UserBrokerageService;

/**
 * @property UserBrokerageService $service
 */
class UserBrokerageController extends AdminController
{
    protected string $serviceName = UserBrokerageService::class;

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
				TableColumn::make()->name('user_id')->label('UserId'),
				TableColumn::make()->name('link_id')->label('LinkId'),
				TableColumn::make()->name('type')->label('Type'),
				TableColumn::make()->name('title')->label('Title'),
				TableColumn::make()->name('number')->label('Number'),
				TableColumn::make()->name('balance')->label('Balance'),
				TableColumn::make()->name('pm')->label('Pm'),
				TableColumn::make()->name('mark')->label('Mark'),
				TableColumn::make()->name('status')->label('Status'),
				TableColumn::make()->name('take')->label('Take'),
				TableColumn::make()->name('frozen_time')->label('FrozenTime'),
				TableColumn::make()->name('created_at')->label(__('admin.created_at'))->type('datetime')->sortable(true),
				TableColumn::make()->name('updated_at')->label(__('admin.updated_at'))->type('datetime')->sortable(true),
                $this->rowActions(true),
            ]);

        return $this->baseList($crud);
    }

    public function form(): Form
    {
        return $this->baseForm()->body([
            TextControl::make()->name('user_id')->label('UserId'),
			TextControl::make()->name('link_id')->label('LinkId'),
			TextControl::make()->name('type')->label('Type'),
			TextControl::make()->name('title')->label('Title'),
			TextControl::make()->name('number')->label('Number'),
			TextControl::make()->name('balance')->label('Balance'),
			TextControl::make()->name('pm')->label('Pm'),
			TextControl::make()->name('mark')->label('Mark'),
			TextControl::make()->name('status')->label('Status'),
			TextControl::make()->name('take')->label('Take'),
			TextControl::make()->name('frozen_time')->label('FrozenTime'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static()->name('id')->label('ID'),
			TextControl::make()->static()->name('user_id')->label('UserId'),
			TextControl::make()->static()->name('link_id')->label('LinkId'),
			TextControl::make()->static()->name('type')->label('Type'),
			TextControl::make()->static()->name('title')->label('Title'),
			TextControl::make()->static()->name('number')->label('Number'),
			TextControl::make()->static()->name('balance')->label('Balance'),
			TextControl::make()->static()->name('pm')->label('Pm'),
			TextControl::make()->static()->name('mark')->label('Mark'),
			TextControl::make()->static()->name('status')->label('Status'),
			TextControl::make()->static()->name('take')->label('Take'),
			TextControl::make()->static()->name('frozen_time')->label('FrozenTime'),
			TextControl::make()->static()->name('created_at')->label(__('admin.created_at')),
			TextControl::make()->static()->name('updated_at')->label(__('admin.updated_at'))
        ]);
    }
}
