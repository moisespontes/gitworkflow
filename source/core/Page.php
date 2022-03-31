<?php

namespace Source\core;

class Page
{
    private $controller;
    private $method;
    private $param;

    /**
     * Page constructor.
     */
    public function __construct()
    {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($url)) {
            $this->controller = "Home";
            $this->method = "index";
            $this->param = null;

            return;
        }
        $urlArr = explode("/", $url);
        $urlArr = array_filter($urlArr);

        $this->controller = $urlArr[0];
        $this->method = ($urlArr[1] ?? 'index');
        $this->param = ($urlArr[2] ?? null);
    }

    /**
     * Carrega uma controller
     *
     * @return void
     */
    public function load(): void
    {
        //code
    }
}
