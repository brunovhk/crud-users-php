<?php

namespace App\Core;

abstract class Controller
{
    protected static function render($view, $model = null)
    {
        $file_view = VIEWS . $view . ".php";

        if (file_exists($file_view)) {
            include $file_view;
        } else {
            exit("Arquivo da view nao encontrado $view");
        }

    }
}
