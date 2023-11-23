<?php

namespace App\Controller;

use Symfony\Component\VarDumper\VarDumper;

class HomeController
{
    public function show()
    {
        VarDumper::dump('ça marche');
    }
}