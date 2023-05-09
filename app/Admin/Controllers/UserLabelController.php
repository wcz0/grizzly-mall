<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Renderers\TableColumn;
use Slowlyo\OwlAdmin\Renderers\TextControl;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\UserLabelService;

/**
 * @property UserLabelService $service
 */
class UserLabelController extends AdminController
{
    protected string $serviceName = UserLabelService::class;

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
				TableColumn::make()->name('cate')->label('Cate'),
				TableColumn::make()->name('cate_name')->label('CateName'),
				TableColumn::make()->name('name')->label('Name'),
                $this->rowActions(true),
            ]);

        return $this->baseList($crud);
    }

    public function form(): Form
    {
        return $this->baseForm()->body([
            TextControl::make()->name('cate')->label('Cate'),
			TextControl::make()->name('cate_name')->label('CateName'),
			TextControl::make()->name('name')->label('Name'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            TextControl::make()->static()->name('id')->label('ID'),
			TextControl::make()->static()->name('cate')->label('Cate'),
			TextControl::make()->static()->name('cate_name')->label('CateName'),
			TextControl::make()->static()->name('name')->label('Name')
        ]);
    }
}
