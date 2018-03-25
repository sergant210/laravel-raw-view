<?php

use Sergant210\RawView\View;

if (! function_exists('view_raw')) {
    /**
     * Get the evaluated view contents for the given raw expression.
     *
     * @param  string  $view Raw expression.
     * @param  array   $data
     * @return \Sergant210\RawView\View
     */
    function view_raw($view, $data = [])
    {
        return new View($view, $data);
    }
}