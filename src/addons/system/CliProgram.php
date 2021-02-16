<?php namespace System;

class CliProgram extends \Ske\System\CliProgram
{
    public function main(int $argc = 0, array $argv = []): void
    {
        if($argc > 1)
        {
            switch($cmd = $argv[1])
            {
                case 'test':
                    exit('Welcome to CLI test !');
                    break;

                default:
                    fputs(STDERR, 'Invalid command given : "' . $cmd . '"');
                    exit(1);
                    break;
            }
        }
        else
        {
            die('Welcome to CLI home !');
        }
    }
}