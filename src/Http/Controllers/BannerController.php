<?php
/**
 * +----------------------------------------------------------------------
 * | Author: Jef    <email：chenxm0592@hotmail.com>
 * +----------------------------------------------------------------------
 */

namespace Features\Http\Controllers;

use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class BannerController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new \Features\Models\Banner(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->position->display(function ($position) {
                return \Features\Models\Banner::POSITION[$position];
            });
            $grid->image->image('',40,40);
            $grid->type->display(function ($type) {
                return \Features\Models\Banner::TYPE[$type];
            });
            $grid->url;
            $grid->switch->switch();
            $grid->order;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();

                $filter->equal('id')->width(2);
                $filter->equal('position')->select(\Features\Models\Banner::POSITION)->width(2);
                $filter->equal('type')->select(\Features\Models\Banner::TYPE)->width(2);
                $filter->equal('switch')->select(\Features\Models\Banner::SWITCH)->width(2);
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new \Features\Models\Banner(), function (Show $show) {
            $show->id;
            $show->position->using(\Features\Models\Banner::POSITION);
            $show->image->image();
            $show->type->using(\Features\Models\Banner::TYPE);
            $show->url;
            $show->switch->using(\Features\Models\Banner::SWITCH);
            $show->order;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new \Features\Models\Banner(), function (Form $form) {
            $form->display('id');
            $form->select('position', trans('banner.fields.position'))->options(
                \Features\Models\Banner::POSITION
            );
            $form->image('image', trans('banner.fields.image'));
            $form->select('type', trans('banner.fields.type'))->options(
                \Features\Models\Banner::TYPE
            );
            $form->text('url', trans('banner.fields.url'));
            $form->switch('switch', trans('banner.fields.switch'))->default(0);
            $form->number('order', trans('banner.fields.order'))->default(0);

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}