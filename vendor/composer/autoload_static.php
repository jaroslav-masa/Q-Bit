<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2e6d2b5d3dd92db427ac380fdadee21f
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2e6d2b5d3dd92db427ac380fdadee21f::$classMap;

        }, null, ClassLoader::class);
    }
}
