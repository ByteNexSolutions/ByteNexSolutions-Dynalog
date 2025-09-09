<?php

namespace ByteNexSolutions\DynaLog\Services;

class LoggerFactory
{
    protected ?LoggerService $current = null;

    public function make(string $category, string $source, string $level = 'debug', int $days = 7): LoggerService
    {
        $this->current = new LoggerService($category, $source, $level, $days);
        return $this->current;
    }

    public function __call($method, $args)
    {
        if ($this->current) {
            return $this->current->$method(...$args);
        }

        throw new \RuntimeException("No logger initialized. Call make() first.");
    }
}
