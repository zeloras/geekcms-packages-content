<?php

namespace Modules\Content\Form;

use Illuminate\Database\Eloquent\Model;
use Modules\Content\Content;

class Form
{
    const MODE_VIEW = 'view';

    const MODE_CREATE = 'create';

    const MODE_EDIT = 'edit';
    protected $model;

    protected $content;

    public function form(Model $model, Content $content)
    {
        $this->setModel($model);
    }

    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    public function setContent(Content $content)
    {
        $this->content = $content;
    }

    public function close()
    {
    }

    public function getModel()
    {
        return $this->model;
    }

    public function create($type, string $attrName, $options = [])
    {
        $name = ucfirst($type);

        if (!class_exists($class = "Modules\\Content\\Form\\{$name}")) {
            throw new \ErrorException('Class not found', 2379);
        }

        $instance = (new $class())->setName($attrName);

        foreach ($options as $key => $value) {
            $instance->{$key} = $value;
        }

        return $instance;
    }
}
