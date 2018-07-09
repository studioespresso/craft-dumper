<?php

namespace studioespresso\craftdumper\web\twig;

use Symfony\Component\VarDumper\VarDumper;
use Twig_Extension;
use Twig_SimpleFunction;
use Twig_Function;

/**
 * Plugin represents the Craft Dumper Twig Extension.
 *
 * @author Studio Espresso <support@studioespresso.co>
 * @license MIT License
 * @link https://github.com/studioespresso/craft3-dumper
 * @package Craft Dumper
 * @since  1.0
 */

class DumperExtension extends Twig_Extension
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
            // false means that it was not set (and the default is on) or it explicitly enabled
            && (false === ini_get('xdebug.overload_var_dump') || ini_get('xdebug.overload_var_dump'))
            // false means that it was not set (and the default is on) or it explicitly enabled
            // xdebug.overload_var_dump produces HTML only when html_errors is also enabled
            && (false === ini_get('html_errors') || ini_get('html_errors'))
            || 'cli' === PHP_SAPI;

		return [
			new Twig_SimpleFunction('d', [$this, 'd']),
			new Twig_SimpleFunction('dd', [$this, 'dd']),
            new Twig_Function('dump', [$this, 'dump'], [
                'is_safe'           => $isDumpOutputHtmlSafe ? ['html'] : [],
                'needs_context'     => true,
                'needs_environment' => true,
            ]),
		];
	}

	/**
	 * @param $variable
	 */
	public function d()
	{
		foreach ( func_get_args() as $item ) {
			echo d( $item );
		}
        echo '<style>pre.sf-dump { z-index: 0; !important} </style>';
	}


	/**
	 * @param $variable
	 */
	public function dd()
	{
		$i   = 0;
		$len = count( func_get_args() );
		foreach ( func_get_args() as $item ) {
			if ( $i == $len - 1 ) {
				echo dd( $item );
			} else {
				echo d( $item );
			}
			$i ++;
		}
        echo '<style>pre.sf-dump { z-index: 0; !important} </style>';
    }

    /**
     * Override dump version of Symfony's VarDumper component
     *
     * @param \Twig_Environment $env
     * @param array             $context
     * @param mixed             ...$vars
     *
     * @return string|null
     */
    public function dump(\Twig_Environment $env, $context, ...$vars)
    {
        if (!$env->isDebug()) {
            return null;
        }

        if (!$vars) {
            $vars = [];
            foreach ($context as $key => $value) {
                if (!$value instanceof \Twig_Template) {
                    $vars[$key] = $value;
                }
            }
        }

        ob_start();

        VarDumper::dump($vars);

        return ob_get_clean();
    }
}