<?php

namespace GeekCms\Content\Form;

use Field as ContentField;
use Throwable;

class Field
{
    protected $name;

    protected $type;

    protected $value;

    protected $id;

    protected $label;

    protected $help;

    protected $view;

    protected $placeholder;

    protected $disabled;

    protected $errors;

    protected $attributes;

    /**
     * Getters & setters.
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        // setter
        if (preg_match('/^set(?<property>[A-Z].+)$/', $name, $match)) {
            $property = lcfirst(array_get($match, 'property'));

            if (property_exists($this, $property)) {
                $this->__set($property, array_get($arguments, '0'));

                return $this;
            }
        }

        // getter
        if (preg_match('/^get(?<property>[A-Z].+)$/', $name, $match)) {
            $property = lcfirst(array_get($match, 'property'));

            if (property_exists($this, $property)) {
                return $this->__get($property);
            }
        }

        return null;
    }

    /**
     * Getters.
     *
     * @param $property
     * @return |null |null
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        }

        return null;
    }

    /**
     * Setters.
     *
     * @param $property
     * @param $value
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->{$property} = $value;
        }
    }

    /**
     * Convert object to string with use render method.
     *
     * @return string
     * @throws Throwable
     *
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * Render field.
     *
     * @return string
     * @throws Throwable
     *
     */
    public function render()
    {
        return view($this->getView(), [
            'field' => $this,
        ])->render();
    }

    public function getValue()
    {
        if (null === $this->value) {
            if ($this->name && $model = ContentField::getModel()) {
                $this->value = $model->getAttribute($this->name);
            }
        }

        return $this->value;
    }

    /**
     * Get field id.
     *
     * @return string
     */
    public function getId()
    {
        if (null === $this->id) {
            if (null === $this->name) {
                $this->setId('field' . substr(md5(time()), 0, 6));
            }

            if (null !== $this->name) {
                $this->setId($this->name);
            }
        }

        return $this->id;
    }
}
