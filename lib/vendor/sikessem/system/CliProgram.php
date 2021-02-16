<?php namespace Ske\System;

abstract class CliProgram extends Program
{
    abstract public function main(int $argc = 0, array $argv = []): void;
}