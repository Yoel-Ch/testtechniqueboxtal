<?php

namespace App\Core;

abstract class BaseController
{
    protected function render(string $view, array $data = [])
    {
        extract($data);

        $content =  $view . '.php';

        require $this->getViewPath().'/layout.php';
    }

    protected function getViewPath()
    {
        return dirname(dirname(__DIR__)) . '/views';
    }
}