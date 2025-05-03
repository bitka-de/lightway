<?php

namespace Lightway\Core;

class Container
{
    public function __construct() {}
    protected array $bindings = [];

    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function get(string $key)
    {
        if (!isset($this->bindings[$key])) {
            throw new \Exception("No binding found for key: {$key}");
        }

        return $this->bindings[$key]();
    }
}
