<?php
 if (!defined('ABSPATH')) exit; class ComposerAutoloaderInit7277f5b4caef3c1c8bbbaaf9b411e640 { private static $loader; public static function loadClassLoader($class) { if ('Composer\Autoload\ClassLoader' === $class) { require __DIR__ . '/ClassLoader.php'; } } public static function getLoader() { if (null !== self::$loader) { return self::$loader; } require __DIR__ . '/platform_check.php'; spl_autoload_register(array('ComposerAutoloaderInit7277f5b4caef3c1c8bbbaaf9b411e640', 'loadClassLoader'), true, true); self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(\dirname(__FILE__))); spl_autoload_unregister(array('ComposerAutoloaderInit7277f5b4caef3c1c8bbbaaf9b411e640', 'loadClassLoader')); $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded()); if ($useStaticLoader) { require __DIR__ . '/autoload_static.php'; call_user_func(\Composer\Autoload\ComposerStaticInit7277f5b4caef3c1c8bbbaaf9b411e640::getInitializer($loader)); } else { $map = require __DIR__ . '/autoload_namespaces.php'; foreach ($map as $namespace => $path) { $loader->set($namespace, $path); } $map = require __DIR__ . '/autoload_psr4.php'; foreach ($map as $namespace => $path) { $loader->setPsr4($namespace, $path); } $classMap = require __DIR__ . '/autoload_classmap.php'; if ($classMap) { $loader->addClassMap($classMap); } } $loader->register(true); if ($useStaticLoader) { $includeFiles = Composer\Autoload\ComposerStaticInit7277f5b4caef3c1c8bbbaaf9b411e640::$files; } else { $includeFiles = require __DIR__ . '/autoload_files.php'; } foreach ($includeFiles as $fileIdentifier => $file) { composerRequire7277f5b4caef3c1c8bbbaaf9b411e640($fileIdentifier, $file); } return $loader; } } function composerRequire7277f5b4caef3c1c8bbbaaf9b411e640($fileIdentifier, $file) { if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) { require $file; $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true; } } 