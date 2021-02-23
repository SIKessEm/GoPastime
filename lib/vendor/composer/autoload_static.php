<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit668a1aa5a6d86e3742d530f0be57fe5e
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Ske\\Parsing\\Url\\' => 16,
            'Ske\\Parsing\\Query\\' => 18,
            'Ske\\Parsing\\Path\\' => 17,
            'Ske\\Cli\\' => 8,
            'Ske\\Cgi\\' => 8,
            'Ske\\' => 4,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ske\\Parsing\\Url\\' => 
        array (
            0 => __DIR__ . '/..' . '/sikessem/parsing-url',
        ),
        'Ske\\Parsing\\Query\\' => 
        array (
            0 => __DIR__ . '/..' . '/sikessem/parsing-query',
        ),
        'Ske\\Parsing\\Path\\' => 
        array (
            0 => __DIR__ . '/..' . '/sikessem/parsing-path',
        ),
        'Ske\\Cli\\' => 
        array (
            0 => __DIR__ . '/..' . '/sikessem/cli-app',
        ),
        'Ske\\Cgi\\' => 
        array (
            0 => __DIR__ . '/..' . '/sikessem/cgi-app',
        ),
        'Ske\\' => 
        array (
            0 => __DIR__ . '/..' . '/sikessem/framework',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit668a1aa5a6d86e3742d530f0be57fe5e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit668a1aa5a6d86e3742d530f0be57fe5e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit668a1aa5a6d86e3742d530f0be57fe5e::$classMap;

        }, null, ClassLoader::class);
    }
}
