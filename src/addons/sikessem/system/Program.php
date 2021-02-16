<?php namespace Ske\System;

abstract class Program
{
    public function __construct(string $root)
    {
        $this->root = $root;
    }

    protected string $root;

    abstract public function main(): void;
}