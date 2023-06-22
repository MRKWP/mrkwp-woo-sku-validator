<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit04f2ba75b13a84e35eba686b5e03ab70
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Woo_Sku_Validator\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Woo_Sku_Validator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit04f2ba75b13a84e35eba686b5e03ab70::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit04f2ba75b13a84e35eba686b5e03ab70::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit04f2ba75b13a84e35eba686b5e03ab70::$classMap;

        }, null, ClassLoader::class);
    }
}
