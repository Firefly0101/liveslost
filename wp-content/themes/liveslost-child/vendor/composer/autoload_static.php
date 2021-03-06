<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit303c2fd1e36d1069e3e0d71e1ae3390c
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit303c2fd1e36d1069e3e0d71e1ae3390c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit303c2fd1e36d1069e3e0d71e1ae3390c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit303c2fd1e36d1069e3e0d71e1ae3390c::$classMap;

        }, null, ClassLoader::class);
    }
}
