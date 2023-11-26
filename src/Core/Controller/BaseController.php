<?php

namespace App\Core\Controller;

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
        return dirname(__DIR__, 3) . '/views';
    }
}