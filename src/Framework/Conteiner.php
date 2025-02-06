<?php

declare(strict_types=1);

namespace Framework;

class Conteiner
{
    private array $definitions = [];

    public function addDefinitions(array $newDefinitions)
    {
        $this->definitions = [...$this->definitions, ...$newDefinitions];
        dd($newDefinitions);
    }
}
