<?php

if (!function_exists('getContentByType')) {
    /**
     * Get content instance by type.
     *
     * @param string $type
     *
     * @return bool|\Modules\Content\Content
     */
    function getContentByType(string $type)
    {
        $type = ucfirst($type);
        $class = "\\Modules\\Content\\Contents\\{$type}";

        if (class_exists($class)) {
            // @var \Modules\Content\Content $content
            return new $class();
        }

        return false;
    }
}
