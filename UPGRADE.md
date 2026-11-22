# Upgrading to Dumper 6 (Craft 6)

Dumper 6 is a much smaller plugin: Craft 6 ships `dump()` and `dd()` itself, so Dumper only adds the `d()` shorthand.

## Requirements

- Craft CMS 6
- PHP 8.5
- `craftcms/yii2-adapter` is not needed

## What changed

| Dumper 5 | Dumper 6 |
| --- | --- |
| `{{ d(var) }}` | unchanged: an alias for Craft's `{{ dump(var) }}` |
| `{{ dd(var) }}` | Craft's own `dd()`, same behaviour |
| `{{ dump() }}` (overridden by Dumper) | Craft's own `dump()`; without arguments it still dumps the template context |
| `d()` / `dd()` in PHP | `d()` from Dumper; `dump()` / `dd()` from Laravel |

Dumps from `d()` in PHP are labelled with Dumper's own file instead of your calling line. Use `dump()` if you need the location.

### Removed

- The static `CraftDumper::$plugin`: use `CraftDumper::getInstance()`.
- `studioespresso\craftdumper\web\twig\DumperExtension` moved to `studioespresso\craftdumper\Twig\DumperExtension`.

## Do you still need it?

Only for `d()`. If you'd rather drop the plugin, replace `d(` with `dump(` in your templates and uninstall it.
