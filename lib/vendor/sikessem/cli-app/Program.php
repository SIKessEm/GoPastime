<?php namespace Ske\Cli;
/**
 * SIKessEm CLI Application program class
 * 
 * @package sikessem/cli-app
 * @license MIT
 * @author SIGUI Kessé Emmanuel
 */
abstract class Program extends \Ske\Program
{
    /**
     * The CLI program handler
     * 
     * @param int $argc Count the command arguments
     * @param array $argv The command arguments values
     * @return void
     */
    abstract public function main(int $argc = 0, array $argv = []): void;
}