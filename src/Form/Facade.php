<?php

namespace GeekCms\Content\Form;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return Form::class;
    }
}
