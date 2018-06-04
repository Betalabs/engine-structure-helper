<?php

namespace Betalabs\StructureHelper;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

class TranslatorFactory
{
    /**
     * @var \Illuminate\Translation\Translator
     */
    private static $factory;

    /**
     * Create an instance Translator
     *
     * @param string $path
     * @param string $locale
     *
     * @return \Illuminate\Translation\Translator
     */
    public static function create(string $path, string $locale): Translator
    {
        if (self::$factory !== null) {
            return self::$factory;
        }

        self::$factory = self::loadTranslator($path, $locale);
        return self::$factory;
    }

    /**
     * Load an instance of Translator
     *
     * @param string $path
     * @param string $locale
     *
     * @return \Illuminate\Translation\Translator
     */
    private static function loadTranslator(string $path, string $locale)
    {
        $path = realpath($path);

        $loader = new FileLoader(new Filesystem(), $path);
        $loader->addNamespace('lang', $path);
        $loader->load($locale, 'validation', 'lang');

        return new Translator($loader, $locale);
    }

}