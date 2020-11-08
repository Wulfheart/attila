<?php

namespace App\Helpers;

class UrlBuilder
{
    protected array $parts;
    public static function base(string $s): UrlBuilder
    {
        return new UrlBuilder($s);
    }

    public function __construct(string $s)
    {
        $this->parts = array($s);
    }

    public function add(string $s): UrlBuilder
    {
        array_push($this->parts, $s);
        return $this;
    }

    public function string(): string
    {
        foreach ($this->parts as $path) $url[] = rtrim($path, '/');
        return implode('/', $url);
    }
}
