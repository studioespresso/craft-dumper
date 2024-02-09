# Dumper for Craft CMS

Easy dump & "dump&die" functions for Twig.

## Requirements

This plugin works with Craft CMS 3, 4 or 5. 

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require studioespresso/craft-dumper

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Dumper.

## Using Dumper

When you install the plugin, you'll be able to use `` Symfony\VarDumper`` in your Twig templates like this:

    {{ d(entry) }}
    
Or you can "dump and die"

    {{ dd(entry) }}
    
Works on strings, arrays, object, etc.


###### Brought to you by [Studio Espresso](https://www.studioespresso.co)
