<?php

namespace Source\App\Controllers;

use Source\core\LoadView;

class Home
{
    public function index()
    {
        $data['user'] = ['name' => 'Moises', 'surname' => 'Pontes'];
        $includes['style'] = ['global', 'signin'];

        (new LoadView($data, $includes))->render('/home');
    }

    private function validation()
    {
    }
}
