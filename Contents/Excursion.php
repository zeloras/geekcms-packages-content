<?php

namespace GeekCms\Content\Contents;

use Field;
use GeekCms\Content\Content;
use GeekCms\Content\Models\ContentModel;

class Excursion extends Content
{
    public static $lang = [
        'ru' => [
            'title' => 'Экскурсии',
            'rows' => [
                'id' => 'ID',
                'title' => 'Заголовок',
                'langues' => 'Языки',
                'status' => 'Статус',
                'updated' => 'Обновлено',
                'created' => 'Создано',
                'actions' => 'Действия',
                'enable' => 'опубликовано',
                'disabled' => 'черновик',
            ],
        ],
    ];

    public $type = 'excursion';

    public $paginate = 15;

    public $columns = [
        'id',
        'title',
        'langues',
        'status',
        'updated',
        'created',
    ];

    public $attributes = [
        'title',
        'days',
        'time',
        'limit',
        'description',
        'image',
        'map',
        'seo_keywords',
        'seo_description',
        'og_type',
        'og_title',
        'og_description',
        'og_image',
    ];

    public function form(ContentModel $model)
    {
        Field::form($model, $this);

        Field::create('input', 'title', [
            'help' => 'Help',
            'label' => '',
        ]);

        Field::create('input', 'slug')->setHelp('slug help');

        Field::close();

        return Field;
    }
}
