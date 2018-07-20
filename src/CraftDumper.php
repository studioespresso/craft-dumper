<?php
/**
 * @copyright Copyright (c) 2017 Studio Espresso
 */

namespace studioespresso\craftdumper;


use Craft;
use studioespresso\craftdumper\web\twig\DumperExtension;

/**
 * Plugin represents the Craft Dumper plugin.
 *
 * @author Studio Espresso <support@studioespresso.co>
 * @license MIT License
 * @link https://github.com/studioespresso/craft3-dumper
 * @package Craft Dumper
 * @since  1.0
 */
class CraftDumper extends \craft\base\Plugin
{

	public static $plugin;

	public function init() {
        parent::init();

        self::$plugin = $this;
		Craft::$app->view->registerTwigExtension( new DumperExtension() );

	}
}
