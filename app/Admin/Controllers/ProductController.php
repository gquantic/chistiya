<?php

namespace App\Admin\Controllers;

use App\Models\Catalogue\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Товары';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('#'));
        $grid->column('slug', __('Ссылка'));
        $grid->column('category_id', __('Категория'));
        $grid->column('image', __('Изображение'));
        $grid->column('title', __('Название'));
        $grid->column('price_1', __('Розница'));
        $grid->column('price_2', __('До 30к руб.'));
        $grid->column('price_3', __('30к - 50к руб.'));
        $grid->column('price_4', __('От 50к руб.'));
        $grid->column('buy_price', __('Цена закупки'));
        $grid->column('description', __('Короткое описание'));
        $grid->column('long_description', __('Описание'));
        $grid->column('remains', __('Остаток на складе'));
        $grid->column('volume', __('Объем'));
        $grid->column('volume_text', __('Название объема'));
        $grid->column('created_at', __('Создан'));
        $grid->column('updated_at', __('Обновлен'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::with('category')->findOrFail($id));

        $show->field('id', __('#'));
        $show->field('slug', __('Ссылка'));
        $show->field('category_id', __('Категория'));
        $show->field('image', __('Изображение'));
        $show->field('title', __('Название'));
        $show->field('price_1', __('Розница'));
        $show->field('price_2', __('До 30 000 руб.'));
        $show->field('price_3', __('30 000 - 50 000 руб.'));
        $show->field('price_4', __('От 50 000 руб.'));
        $show->field('buy_price', __('Цена закупки'));
        $show->field('description', __('Короткое описание'));
        $show->field('long_description', __('Описание'));
        $show->field('remains', __('Остаток на складе'));
        $show->field('volume', __('Объем'));
        $show->field('volume_text', __('Название объема'));
        $show->field('created_at', __('Создан'));
        $show->field('updated_at', __('Обновлен'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->number('id', __('#'));
        $form->number('category_id', __('Категория'));
        $form->image('image', __('Изображение'));
        $form->text('title', __('Название'));
        $form->decimal('price_1', __('Розница'));
        $form->decimal('price_2', __('До 30 000 руб.'));
        $form->decimal('price_3', __('30 000 - 50 000 руб.'));
        $form->decimal('price_4', __('От 50 000 руб.'));
        $form->decimal('buy_price', __('Цена закупки'))->default(0.00);
        $form->textarea('description', __('Короткое описание'));
        $form->textarea('long_description', __('Описание'));
        $form->number('remains', __('Остаток на складе'));
        $form->decimal('volume', __('Объем'))->default(0.50);
        $form->text('volume_text', __('Название объема'))->default('л');

        return $form;
    }
}
