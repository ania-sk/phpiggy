<?php

declare(strict_types=1);

namespace Framework;

class App
{

    private Router $router;
    private Conteiner $conteiner;

    public function __construct(string $conteinerDefinitionsPath = null)
    {
        $this->router = new Router;
        $this->conteiner = new Conteiner;

        if ($conteinerDefinitionsPath) {
            $conteinerDefinitions = include $conteinerDefinitionsPath;
            $this->conteiner->addDefinitions($conteinerDefinitions);
        }
    }

    public function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatch($path, $method);
    }

    public function get(string $path, array $controller)
    {
        $this->router->add('GET', $path, $controller);
    }
}
