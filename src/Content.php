<?php

namespace GeekCms\Content;

use GeekCms\Content\Models\ContentModel;
use LaravelLocalization;

class Content
{
    public static $contentModel = ContentModel::class;

    public static $viewList = 'content::index';

    public static $viewEdit = 'content::edit';

    public static $lang = [
        'ru' => [
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

    public $type;

    public $attributes = [];

    public $columns = [
        'id',
        'title',
        'langues',
        'status',
        'updated',
        'created',
    ];

    public $paginate = 50;

    public function __construct()
    {
        // set model content structure
        $model = static::$contentModel;
        $model::$content = $this;
    }

    public static function trans($path)
    {
        $localePath = config('app.locale') . '.' . $path;

        return array_get(static::$lang, $localePath, $path);
    }

    public function getByColumn($column, $model)
    {
        $method = 'get' . ucfirst(camel_case($column)) . 'Column';

        if (method_exists($this, $method)) {
            return $this->{$method}($model);
        }

        return $model->{$column};
    }

    public function getActionsColumn($model)
    {
        return view('content::components.table.row_actions', [
            'item' => $model,
        ]);
    }

    public function getUpdatedColumn($model)
    {
        return view('content::components.table.row_update', [
            'user' => $model->updated_by,
            'time' => $model->updated_at,
        ]);
    }

    public function getCreatedColumn($model)
    {
        return view('content::components.table.row_update', [
            'user' => $model->created_by,
            'time' => $model->created_at,
        ]);
    }

    public function getStatusColumn($model)
    {
        return view('content::components.table.row_status', [
            'status' => $model->status,
        ]);
    }

    public function getItems()
    {
        return $this->getModel()::where('type', $this->type)->paginate($this->paginate);
    }

    /**
     * @return ContentModel|string
     */
    public function getModel()
    {
        return static::$contentModel;
    }

    public function getColumns()
    {
        $columns = [];

        foreach ($this->columns as $key => $column) {
            $item = (method_exists($this, $column)) ? $key : $column;

            // $itemTrans = \Translate::get("rows.{$item}");

            $columns[] = $item;
        }

        $columns[] = 'actions';

        return $columns;
    }

    public function getLanguesColumn($model)
    {
        $langs = [];
        $locales = config('laravellocalization.supportedLocales', []);

        foreach ($model->getLangs() as $lang) {
            $langs[] = [
                'url' => LaravelLocalization::getLocalizedURL($lang, $model->url),
                'locale' => $lang,
                'langue' => array_get($locales, "{$lang}.name", $lang),
            ];
        }

        return view('content::components.table.row_langues', [
            'langs' => $langs,
        ]);
    }
}
