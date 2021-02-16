<?php namespace Ske\System;

abstract class CgiProgram extends Program
{
    abstract public function main(string $base = ''): void;
}