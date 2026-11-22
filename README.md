# Dumper for Craft CMS

Easy dump & "dump&die" functions for Twig.

## Requirements

This plugin requires Craft CMS 6. Upgrading from Craft 5? See [UPGRADE.md](UPGRADE.md).

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require studioespresso/craft-dumper

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Dumper.

## Using Dumper

Craft 6 already ships `dump()` and `dd()`. This plugin adds `d()` as a shorthand for `dump()` in your Twig templates:

    {{ d(entry) }}
    
Or you can "dump and die"

    {{ dd(entry) }}
    
Works on strings, arrays, object, etc. `{{ d() }}` without arguments dumps the whole template context.

`d()` also works in PHP.


###### Brought to you by [Studio Espresso](https://www.studioespresso.co)
