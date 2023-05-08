<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\UserBrokerageFrozenService;

/**
 * @property UserBrokerageFrozenService $service
 */
class UserBrokerageFrozenController extends AdminController
{
    protected string $serviceName = UserBrokerageFrozenService::class;

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
				TableColumn::make()->name('price')->label('Price'),
				TableColumn::make()->name('uill_id')->label('UillId'),
				TableColumn::make()->name('frozen_time')->label('FrozenTime'),
				TableColumn::make()->name('state')->label('State'),
				TableColumn::make()->name('order_id')->label('OrderId'),
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
			TextControl::make()->name('price')->label('Price'),
			TextControl::make()->name('uill_id')->label('UillId'),
			TextControl::make()->name('frozen_time')->label('FrozenTime'),
			TextControl::make()->name('state')->label('State'),
			TextControl::make()->name('order_id')->label('OrderId'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static()->name('id')->label('ID'),
			TextControl::make()->static()->name('user_id')->label('UserId'),
			TextControl::make()->static()->name('price')->label('Price'),
			TextControl::make()->static()->name('uill_id')->label('UillId'),
			TextControl::make()->static()->name('frozen_time')->label('FrozenTime'),
			TextControl::make()->static()->name('state')->label('State'),
			TextControl::make()->static()->name('order_id')->label('OrderId'),
			TextControl::make()->static()->name('created_at')->label(__('admin.created_at')),
			TextControl::make()->static()->name('updated_at')->label(__('admin.updated_at'))
        ]);
    }
}
