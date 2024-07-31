<?php

namespace LPWithLatte\library;

use Latte\Engine;

class View
{
    public static function render($view, $params = [])
    {

        $path = dirname(__FILE__, 2) . '/views';
        $latte = new Engine;
        // cache directory
        $latte->setTempDirectory($path . '/cache');

        $latte->render($path . '/' . $view, $params);
    }
}