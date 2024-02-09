<?php

namespace studioespresso\craftdumper\web\twig;

use Symfony\Component\VarDumper\VarDumper;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\Template;
use Twig\TwigFunction;

/**
 * Plugin represents the Craft Dumper Twig Extension.
 *
 * @author Studio Espresso <support@studioespresso.co>
 * @license MIT License
 * @link https://github.com/studioespresso/craft3-dumper
 * @package Craft Dumper
 * @since  1.0
 */

class DumperExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return 'Dumper';
    }


    /**
     * Get Functions
     *
     * @return array
     */
    public function getFunctions()
    {
        // dump is safe if var_dump is overridden by xdebug
        $isDumpOutputHtmlSafe = extension_loaded('xdebug')
            && (false === ini_get('xdebug.overload_var_dump') || ini_get('xdebug.overload_var_dump'))
            // false means that it was not set (and the default is on) or it explicitly enabled
            // xdebug.overload_var_dump produces HTML only when html_errors is also enabled
            && (false === ini_get('html_errors') || ini_get('html_errors'))
            || 'cli' === PHP_SAPI;

        return [
            new TwigFunction('d', [$this, 'd']),
            new TwigFunction('dd', [$this, 'dd'], [
                'is_safe' => $isDumpOutputHtmlSafe ? ['html'] : [],
                'needs_context' => false,
                'needs_environment' => false,
                'debug' => true,
            ]),
            new TwigFunction('dump', [$this, 'dump'], [
                'is_safe' => $isDumpOutputHtmlSafe ? ['html'] : [],
                'needs_context' => true,
                'needs_environment' => true,
            ]),
        ];
    }

    /**
     * @param $variable
     */
    public function d()
    {
        foreach (func_get_args() as $item) {
            echo VarDumper::dump($item);
        }
        echo '<style>pre.sf-dump { z-index: 0; !important} </style>';
    }


    /**
     * @param $variable
     */
    public function dd()
    {
        $i = 0;
        $len = count(func_get_args());
        foreach (func_get_args() as $item) {
            if ($i == $len - 1) {
                /** @phpstan-ignore-next-line */
                echo dd($item);
            } else {
                echo VarDumper::dump($item);
            }
            $i++;
        }
        echo '<style>pre.sf-dump { z-index: 0; !important} </style>';
    }

    /**
     * Override dump version of Symfony's VarDumper component
     */
    public function dump(Environment $env, array $context, ...$vars)
    {
        if (!$vars) {
            $vars = [];
            foreach ($context as $key => $value) {
                if (!$value instanceof Template) {
                    $vars[$key] = $value;
                }
            }
        }

        ob_start();

        VarDumper::dump($vars);

        echo ob_get_clean();
    }
}
