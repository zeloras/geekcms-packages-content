<?php

use GeekCms\Content\Content;

if (!function_exists('getContentByType')) {
    /**
     * Get content instance by type.
     *
     * @param string $type
     *
     * @return bool|Content
     */
    function getContentByType(string $type)
    {
        $type = ucfirst($type);
        $class = "\\GeekCms\\Content\\Contents\\{$type}";

        if (class_exists($class)) {
            // @var \GeekCms\Content\Content $content
            return new $class();
        }

        return false;
    }
}
