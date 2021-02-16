<?php namespace Ske\System;

abstract class Program
{
    public const INVALID_ROOT_VALUES = ['.', '..'];

    public const INVALID_ROOT_ERROR = 0x01;

    public function __construct(string $root, array $options = [])
    {
        if(empty($root))
            throw new \InvalidArgumentException('Empty directory given', self::INVALID_ROOT_ERROR);
            
        if(in_array($root, self::INVALID_ROOT_VALUES))
            throw new \InvalidArgumentException('Cannot use "' . $root . '" as directory', self::INVALID_ROOT_ERROR);
        
        if(!is_dir($root))
            throw new \InvalidArgumentException('No such directory "' . $root . '"', self::INVALID_ROOT_ERROR);
            
        $this->root = $root;
        $this->options = $options;
    }

    protected string $root;

    public function root(): string
    {
        return $this->root;
    }

    protected array $options;

    abstract public function main(): void;

    public function __invoke(...$args)
    {
        $data = [];

        foreach($args as $index)
            $data[$index] = $this->options[$index] ?? null;

        if(count($data) === 1)
            $data = $data[array_key_first($data)];
        
        return $data;
    }
}