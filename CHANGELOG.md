# Changelog

## 2.0.0

## Fixed
- Due to an update to `twig/twig` an Craft requiring that version we had to bump to twig version for this to keep the dump&die/dd function working. [#10](https://github.com/studioespresso/craft3-dumper/issues/10)


## 1.3.1 - 2018-07-10
### Fixed
- Fixes a bug where the plugin may cause Twig to be loaded before it should be ([#9](https://github.com/studioespresso/craft3-dumper/pull/9), via [brandonkelly](https://github.com/brandonkelly))


## 1.3.0 - 2018-07-10
### Added
- the plugin now also handles the Craft's dump function ([#8](https://github.com/studioespresso/craft3-dumper/pull/8), via [bertoost](https://github.com/bertoost))

## 1.2.0 - 2018-04-07
### Fixed
- Fixed an issue where the debug output would overlap with Craft's modals (reported by @lukeyouel)

## 1.1.3 - 2018-02-01

### Fixed
- Fixed plugin init() function (@FreekVR)

## 1.1.2 - 2017-12-13

### Fixed
- Make the plugin work with future RC versions


## 1.1.0 - 2017-11-23

- Craft 3 RC 1 release


## 1.0.0 - 2017-10-08

- Initial release.