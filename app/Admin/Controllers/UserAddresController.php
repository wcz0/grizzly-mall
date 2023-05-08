<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\UserAddresService;

/**
 * @property UserAddresService $service
 */
class UserAddresController extends AdminController
{
    protected string $serviceName = UserAddresService::class;

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
				TableColumn::make()->name('name')->label('Name'),
				TableColumn::make()->name('phone')->label('Phone'),
				TableColumn::make()->name('province')->label('Province'),
				TableColumn::make()->name('city')->label('City'),
				TableColumn::make()->name('city_id')->label('CityId'),
				TableColumn::make()->name('district')->label('District'),
				TableColumn::make()->name('detail')->label('Detail'),
				TableColumn::make()->name('post_code')->label('PostCode'),
				TableColumn::make()->name('longitude')->label('Longitude'),
				TableColumn::make()->name('latitude')->label('Latitude'),
				TableColumn::make()->name('is_default')->label('IsDefault'),
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
			TextControl::make()->name('name')->label('Name'),
			TextControl::make()->name('phone')->label('Phone'),
			TextControl::make()->name('province')->label('Province'),
			TextControl::make()->name('city')->label('City'),
			TextControl::make()->name('city_id')->label('CityId'),
			TextControl::make()->name('district')->label('District'),
			TextControl::make()->name('detail')->label('Detail'),
			TextControl::make()->name('post_code')->label('PostCode'),
			TextControl::make()->name('longitude')->label('Longitude'),
			TextControl::make()->name('latitude')->label('Latitude'),
			TextControl::make()->name('is_default')->label('IsDefault'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static()->name('id')->label('ID'),
			TextControl::make()->static()->name('user_id')->label('UserId'),
			TextControl::make()->static()->name('name')->label('Name'),
			TextControl::make()->static()->name('phone')->label('Phone'),
			TextControl::make()->static()->name('province')->label('Province'),
			TextControl::make()->static()->name('city')->label('City'),
			TextControl::make()->static()->name('city_id')->label('CityId'),
			TextControl::make()->static()->name('district')->label('District'),
			TextControl::make()->static()->name('detail')->label('Detail'),
			TextControl::make()->static()->name('post_code')->label('PostCode'),
			TextControl::make()->static()->name('longitude')->label('Longitude'),
			TextControl::make()->static()->name('latitude')->label('Latitude'),
			TextControl::make()->static()->name('is_default')->label('IsDefault'),
			TextControl::make()->static()->name('created_at')->label(__('admin.created_at')),
			TextControl::make()->static()->name('updated_at')->label(__('admin.updated_at'))
        ]);
    }
}
