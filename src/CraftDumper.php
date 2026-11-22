<?php

namespace studioespresso\craftdumper;

use CraftCms\Cms\Plugin\Plugin;
use CraftCms\Cms\Support\Facades\Twig;
use studioespresso\craftdumper\Twig\DumperExtension;

/**
 * Dumper plugin
 *
 * @author Studio Espresso <support@studioespresso.co>
 * @copyright Studio Espresso
 * @license MIT
 */
class CraftDumper extends Plugin
{
    public function boot(): void
    {
        Twig::registerExtension(new DumperExtension);
    }
}
