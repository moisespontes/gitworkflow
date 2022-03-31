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

        $this->controller = str_slug($urlArr[0]);
        $this->method = str_slug(($urlArr[1] ?? 'index'), true);
        $this->param = ($urlArr[2] ?? null);
    }

    /**
     * Carrega uma controller
     *
     * @return void
     */
    public function load(): void
    {
        $class = "Source\App\Controllers\\{$this->controller}";

        if (!class_exists($class)) {
            $this->controller = 'NotFound';
            $this->load();
            return;
        }

        if (!method_exists($class, $this->method)) {
            $this->controller = 'NotFound';
            $this->method = 'index';
            $this->load();
            return;
        }

        (new $class())->{$this->method}($this->param);
        return;
    }
}
