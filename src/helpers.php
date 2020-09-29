<?php

use RawView\View;

if (! function_exists('view_raw')) {
    /**
     * Get the evaluated view contents for the given raw expression.
     *
     * @param  string  $view Html code.
     * @param  array   $data
     * @return RawView\View
     */
    function view_raw($view, $data = [])
    {
        return new View($view, $data);
    }
}