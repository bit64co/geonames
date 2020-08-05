# GeoNames Library

This library aims to aggregate the [GeoNames](https://geonames.org/) API as well as compile a locally stored geo database service from the GeoNames data dump.

> The GeoNames geographical database covers all countries and contains over eleven million placenames that are available for download free of charge.

## Usage

```
use Bit64\GeoNames\GeoNamesApi;

$api = new GeoNamesApi([
	'username' => 'demo',
	'lang' => 'en',
]);

$lookup = $api->get([
	'geonameId' => 3369157,
]);

print($lookup['name']);

// Output
Cape Town

```
[Read the documentation](./docs/Docs.md) for more information.

_This library may not be a complete work, as it is going to be continually developed until it meets the requirements for its general intended purpose_

## License

For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
