<?php

namespace Source\core;

class LoadView
{
    private $data;
    private $includes;
    private $options = [
        "head" => true,
        "footer" => true
    ];

    public function __construct(array $data, array $includes = [], array $options = [])
    {
        $this->data = $data;
        $this->includes = $includes;
        $this->options = array_merge($this->options, $options);

        if ($this->options['head']) {
            include VIEW_HEAD;
        }
    }

    public function render(string $view): void
    {
        if (!file_exists(VIEWS_PATH . $view . '.php')) {
            echo "Erro ao carregar a página: {$view}";
        }

        include VIEWS_PATH . "{$view}.php";
        return;
    }

    public function __destruct()
    {
        if ($this->options['footer']) {
            include VIEW_FOOTER;
        }
    }
}
