<?php

namespace studioespresso\craftdumper\web\twig;

use Twig_Extension;
use Twig_SimpleFunction;

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
		return [
			new Twig_SimpleFunction('d', [$this, 'd']),
			new Twig_SimpleFunction('dd', [$this, 'dd']),

		];
	}

	/**
	 * @param $variable
	 */
	public function d($variable)
	{

		return d($variable);
	}


	/**
	 * @param $variable
	 */
	public function dd($variable)
	{

		return dd($variable);
	}

}