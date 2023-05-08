<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\StoreCartService;

/**
 * @property StoreCartService $service
 */
class StoreCartController extends AdminController
{
    protected string $serviceName = StoreCartService::class;

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
				TableColumn::make()->name('type')->label('Type'),
				TableColumn::make()->name('product_id')->label('ProductId'),
				TableColumn::make()->name('product_attr')->label('ProductAttr'),
				TableColumn::make()->name('number')->label('Number'),
				TableColumn::make()->name('is_pay')->label('IsPay'),
				TableColumn::make()->name('is_new')->label('IsNew'),
				TableColumn::make()->name('combination_id')->label('CombinationId'),
				TableColumn::make()->name('seckill_id')->label('SeckillId'),
				TableColumn::make()->name('bargain_id')->label('BargainId'),
				TableColumn::make()->name('advance_id')->label('AdvanceId'),
				TableColumn::make()->name('state')->label('State'),
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
			TextControl::make()->name('type')->label('Type'),
			TextControl::make()->name('product_id')->label('ProductId'),
			TextControl::make()->name('product_attr')->label('ProductAttr'),
			TextControl::make()->name('number')->label('Number'),
			TextControl::make()->name('is_pay')->label('IsPay'),
			TextControl::make()->name('is_new')->label('IsNew'),
			TextControl::make()->name('combination_id')->label('CombinationId'),
			TextControl::make()->name('seckill_id')->label('SeckillId'),
			TextControl::make()->name('bargain_id')->label('BargainId'),
			TextControl::make()->name('advance_id')->label('AdvanceId'),
			TextControl::make()->name('state')->label('State'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static()->name('id')->label('ID'),
			TextControl::make()->static()->name('user_id')->label('UserId'),
			TextControl::make()->static()->name('type')->label('Type'),
			TextControl::make()->static()->name('product_id')->label('ProductId'),
			TextControl::make()->static()->name('product_attr')->label('ProductAttr'),
			TextControl::make()->static()->name('number')->label('Number'),
			TextControl::make()->static()->name('is_pay')->label('IsPay'),
			TextControl::make()->static()->name('is_new')->label('IsNew'),
			TextControl::make()->static()->name('combination_id')->label('CombinationId'),
			TextControl::make()->static()->name('seckill_id')->label('SeckillId'),
			TextControl::make()->static()->name('bargain_id')->label('BargainId'),
			TextControl::make()->static()->name('advance_id')->label('AdvanceId'),
			TextControl::make()->static()->name('state')->label('State'),
			TextControl::make()->static()->name('created_at')->label(__('admin.created_at')),
			TextControl::make()->static()->name('updated_at')->label(__('admin.updated_at'))
        ]);
    }
}
