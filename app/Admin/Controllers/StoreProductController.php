<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\StoreProductService;

/**
 * @property StoreProductService $service
 */
class StoreProductController extends AdminController
{
    protected string $serviceName = StoreProductService::class;

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
				TableColumn::make()->name('mer_id')->label('MerId'),
				TableColumn::make()->name('image')->label('Image'),
				TableColumn::make()->name('recommend_image')->label('RecommendImage'),
				TableColumn::make()->name('slider_image')->label('SliderImage'),
				TableColumn::make()->name('name')->label('Name'),
				TableColumn::make()->name('info')->label('Info'),
				TableColumn::make()->name('keyword')->label('Keyword'),
				TableColumn::make()->name('bar_code')->label('BarCode'),
				TableColumn::make()->name('cate_id')->label('CateId'),
				TableColumn::make()->name('price')->label('Price'),
				TableColumn::make()->name('vip_price')->label('VipPrice'),
				TableColumn::make()->name('ot_price')->label('OtPrice'),
				TableColumn::make()->name('postage')->label('Postage'),
				TableColumn::make()->name('unit_name')->label('UnitName'),
				TableColumn::make()->name('sort')->label('Sort'),
				TableColumn::make()->name('sales')->label('Sales'),
				TableColumn::make()->name('stock')->label('Stock'),
				TableColumn::make()->name('is_show')->label('IsShow'),
				TableColumn::make()->name('is_hot')->label('IsHot'),
				TableColumn::make()->name('is_benefit')->label('IsBenefit'),
				TableColumn::make()->name('is_best')->label('IsBest'),
				TableColumn::make()->name('is_nwe')->label('IsNwe'),
				TableColumn::make()->name('is_virtual')->label('IsVirtual'),
				TableColumn::make()->name('virtual_type')->label('VirtualType'),
				TableColumn::make()->name('is_postage')->label('IsPostage'),
				TableColumn::make()->name('mer_use')->label('MerUse'),
				TableColumn::make()->name('give_integral')->label('GiveIntegral')->sortable(true),
				TableColumn::make()->name('cost')->label('Cost'),
				TableColumn::make()->name('is_seckill')->label('IsSeckill'),
				TableColumn::make()->name('is_bargain')->label('IsBargain'),
				TableColumn::make()->name('is_good')->label('IsGood'),
				TableColumn::make()->name('is_sub')->label('IsSub'),
				TableColumn::make()->name('is_vip')->label('IsVip'),
				TableColumn::make()->name('ficti')->label('Ficti'),
				TableColumn::make()->name('browse')->label('Browse'),
				TableColumn::make()->name('code_path')->label('CodePath'),
				TableColumn::make()->name('source_link')->label('SourceLink'),
				TableColumn::make()->name('video_link')->label('VideoLink'),
				TableColumn::make()->name('temp_id')->label('TempId'),
				TableColumn::make()->name('spec_type')->label('SpecType'),
				TableColumn::make()->name('activity')->label('Activity'),
				TableColumn::make()->name('spu')->label('Spu'),
				TableColumn::make()->name('command_word')->label('CommandWord'),
				TableColumn::make()->name('recommend_llist')->label('RecommendLlist'),
				TableColumn::make()->name('vip_product')->label('VipProduct'),
				TableColumn::make()->name('presale')->label('Presale'),
				TableColumn::make()->name('presale_start_time')->label('PresaleStartTime'),
				TableColumn::make()->name('presale_end_time')->label('PresaleEndTime'),
				TableColumn::make()->name('presale_day')->label('PresaleDay'),
				TableColumn::make()->name('logistics')->label('Logistics'),
				TableColumn::make()->name('freight')->label('Freight'),
				TableColumn::make()->name('custom_form')->label('CustomForm'),
				TableColumn::make()->name('is_limit')->label('IsLimit'),
				TableColumn::make()->name('limit_type')->label('LimitType'),
				TableColumn::make()->name('limit_num')->label('LimitNum'),
				TableColumn::make()->name('created_at')->label('创建时间')->type('datetime')->sortable(true),
				TableColumn::make()->name('updated_at')->label('更新时间')->type('datetime')->sortable(true),
                $this->rowActions(true),
            ]);

        return $this->baseList($crud);
    }

    public function form(): Form
    {
        return $this->baseForm()->body([
            TextControl::make()->name('mer_id')->label('MerId'),
			TextControl::make()->name('image')->label('Image'),
			TextControl::make()->name('recommend_image')->label('RecommendImage'),
			TextControl::make()->name('slider_image')->label('SliderImage'),
			TextControl::make()->name('name')->label('Name'),
			TextControl::make()->name('info')->label('Info'),
			TextControl::make()->name('keyword')->label('Keyword'),
			TextControl::make()->name('bar_code')->label('BarCode'),
			TextControl::make()->name('cate_id')->label('CateId'),
			TextControl::make()->name('price')->label('Price'),
			TextControl::make()->name('vip_price')->label('VipPrice'),
			TextControl::make()->name('ot_price')->label('OtPrice'),
			TextControl::make()->name('postage')->label('Postage'),
			TextControl::make()->name('unit_name')->label('UnitName'),
			TextControl::make()->name('sort')->label('Sort'),
			TextControl::make()->name('sales')->label('Sales'),
			TextControl::make()->name('stock')->label('Stock'),
			TextControl::make()->name('is_show')->label('IsShow'),
			TextControl::make()->name('is_hot')->label('IsHot'),
			TextControl::make()->name('is_benefit')->label('IsBenefit'),
			TextControl::make()->name('is_best')->label('IsBest'),
			TextControl::make()->name('is_nwe')->label('IsNwe'),
			TextControl::make()->name('is_virtual')->label('IsVirtual'),
			TextControl::make()->name('virtual_type')->label('VirtualType'),
			TextControl::make()->name('is_postage')->label('IsPostage'),
			TextControl::make()->name('mer_use')->label('MerUse'),
			TextControl::make()->name('give_integral')->label('GiveIntegral'),
			TextControl::make()->name('cost')->label('Cost'),
			TextControl::make()->name('is_seckill')->label('IsSeckill'),
			TextControl::make()->name('is_bargain')->label('IsBargain'),
			TextControl::make()->name('is_good')->label('IsGood'),
			TextControl::make()->name('is_sub')->label('IsSub'),
			TextControl::make()->name('is_vip')->label('IsVip'),
			TextControl::make()->name('ficti')->label('Ficti'),
			TextControl::make()->name('browse')->label('Browse'),
			TextControl::make()->name('code_path')->label('CodePath'),
			TextControl::make()->name('source_link')->label('SourceLink'),
			TextControl::make()->name('video_link')->label('VideoLink'),
			TextControl::make()->name('temp_id')->label('TempId'),
			TextControl::make()->name('spec_type')->label('SpecType'),
			TextControl::make()->name('activity')->label('Activity'),
			TextControl::make()->name('spu')->label('Spu'),
			TextControl::make()->name('command_word')->label('CommandWord'),
			TextControl::make()->name('recommend_llist')->label('RecommendLlist'),
			TextControl::make()->name('vip_product')->label('VipProduct'),
			TextControl::make()->name('presale')->label('Presale'),
			TextControl::make()->name('presale_start_time')->label('PresaleStartTime'),
			TextControl::make()->name('presale_end_time')->label('PresaleEndTime'),
			TextControl::make()->name('presale_day')->label('PresaleDay'),
			TextControl::make()->name('logistics')->label('Logistics'),
			TextControl::make()->name('freight')->label('Freight'),
			TextControl::make()->name('custom_form')->label('CustomForm'),
			TextControl::make()->name('is_limit')->label('IsLimit'),
			TextControl::make()->name('limit_type')->label('LimitType'),
			TextControl::make()->name('limit_num')->label('LimitNum'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static(true)->name('id')->label('ID'),
			TextControl::make()->static(true)->name('mer_id')->label('MerId'),
			TextControl::make()->static(true)->name('image')->label('Image'),
			TextControl::make()->static(true)->name('recommend_image')->label('RecommendImage'),
			TextControl::make()->static(true)->name('slider_image')->label('SliderImage'),
			TextControl::make()->static(true)->name('name')->label('Name'),
			TextControl::make()->static(true)->name('info')->label('Info'),
			TextControl::make()->static(true)->name('keyword')->label('Keyword'),
			TextControl::make()->static(true)->name('bar_code')->label('BarCode'),
			TextControl::make()->static(true)->name('cate_id')->label('CateId'),
			TextControl::make()->static(true)->name('price')->label('Price'),
			TextControl::make()->static(true)->name('vip_price')->label('VipPrice'),
			TextControl::make()->static(true)->name('ot_price')->label('OtPrice'),
			TextControl::make()->static(true)->name('postage')->label('Postage'),
			TextControl::make()->static(true)->name('unit_name')->label('UnitName'),
			TextControl::make()->static(true)->name('sort')->label('Sort'),
			TextControl::make()->static(true)->name('sales')->label('Sales'),
			TextControl::make()->static(true)->name('stock')->label('Stock'),
			TextControl::make()->static(true)->name('is_show')->label('IsShow'),
			TextControl::make()->static(true)->name('is_hot')->label('IsHot'),
			TextControl::make()->static(true)->name('is_benefit')->label('IsBenefit'),
			TextControl::make()->static(true)->name('is_best')->label('IsBest'),
			TextControl::make()->static(true)->name('is_nwe')->label('IsNwe'),
			TextControl::make()->static(true)->name('is_virtual')->label('IsVirtual'),
			TextControl::make()->static(true)->name('virtual_type')->label('VirtualType'),
			TextControl::make()->static(true)->name('is_postage')->label('IsPostage'),
			TextControl::make()->static(true)->name('mer_use')->label('MerUse'),
			TextControl::make()->static(true)->name('give_integral')->label('GiveIntegral'),
			TextControl::make()->static(true)->name('cost')->label('Cost'),
			TextControl::make()->static(true)->name('is_seckill')->label('IsSeckill'),
			TextControl::make()->static(true)->name('is_bargain')->label('IsBargain'),
			TextControl::make()->static(true)->name('is_good')->label('IsGood'),
			TextControl::make()->static(true)->name('is_sub')->label('IsSub'),
			TextControl::make()->static(true)->name('is_vip')->label('IsVip'),
			TextControl::make()->static(true)->name('ficti')->label('Ficti'),
			TextControl::make()->static(true)->name('browse')->label('Browse'),
			TextControl::make()->static(true)->name('code_path')->label('CodePath'),
			TextControl::make()->static(true)->name('source_link')->label('SourceLink'),
			TextControl::make()->static(true)->name('video_link')->label('VideoLink'),
			TextControl::make()->static(true)->name('temp_id')->label('TempId'),
			TextControl::make()->static(true)->name('spec_type')->label('SpecType'),
			TextControl::make()->static(true)->name('activity')->label('Activity'),
			TextControl::make()->static(true)->name('spu')->label('Spu'),
			TextControl::make()->static(true)->name('command_word')->label('CommandWord'),
			TextControl::make()->static(true)->name('recommend_llist')->label('RecommendLlist'),
			TextControl::make()->static(true)->name('vip_product')->label('VipProduct'),
			TextControl::make()->static(true)->name('presale')->label('Presale'),
			TextControl::make()->static(true)->name('presale_start_time')->label('PresaleStartTime'),
			TextControl::make()->static(true)->name('presale_end_time')->label('PresaleEndTime'),
			TextControl::make()->static(true)->name('presale_day')->label('PresaleDay'),
			TextControl::make()->static(true)->name('logistics')->label('Logistics'),
			TextControl::make()->static(true)->name('freight')->label('Freight'),
			TextControl::make()->static(true)->name('custom_form')->label('CustomForm'),
			TextControl::make()->static(true)->name('is_limit')->label('IsLimit'),
			TextControl::make()->static(true)->name('limit_type')->label('LimitType'),
			TextControl::make()->static(true)->name('limit_num')->label('LimitNum'),
			TextControl::make()->static(true)->name('created_at')->label('创建时间'),
			TextControl::make()->static(true)->name('updated_at')->label('更新时间')
        ]);
    }
}
