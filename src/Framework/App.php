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

        $this->router->dispatch($path, $method, $this->conteiner);
    }

    public function get(string $path, array $controller): App
    {
        $this->router->add('GET', $path, $controller);

        return $this;
    }

    public function post(string $path, array $controller): App
    {
        $this->router->add('POST', $path, $controller);

        return $this;
    }

    public function delete(string $path, array $controller): App
    {
        $this->router->add('DELETE', $path, $controller);

        return $this;
    }

    public function addMiddleware(string $middleware)
    {
        $this->router->addMiddleware($middleware);
    }

    public function add(string $middleware)
    {
        $this->router->addRouteMiddleware($middleware);
    }

    public function setErrorHandler(array $controller)
    {
        $this->router->setErrorHandler($controller);
    }
}
