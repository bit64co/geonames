# Documentation
[GeoNames Library](../README.md) &nbsp; » &nbsp;
Docs

---

## API Reference

* [Get](./Get.md)
* [Search](./Search.md)

## Usage

**Instantiating the API**

```
use Bit64\GeoNames\GeoNamesApi;

$configs = [
	'username' => 'demo',
];

$api = new GeoNamesApi($configs);

```

**Changing config at runtime**

```
$api->lang = 'af';
$api->charset = 'UTF8';
```

**Caching**

The API does not cache results by default, but you can easily enable it by providing the `cacheTtl` option
```
// Time to live (in seconds)
$api->cacheTtl = 604800;
```

Customise the cache directory
```
// mkdir is used recursively to create this path
$api->cacheDir = 'path/to/dir';
```

**Error handling**

```
// All exceptions in this library extend this base exception
use Bit64\GeoNames\Exception\GeoNamesException;

try {

	// This will fail with a status message from GeoNames
	$parameters = ['featureClass' => 'OOPS'];
	$results = $api->search($parameters);

} catch(GeoNamesException $e) {

	print_r($e->getMessage());

}

// Output
invalid feature class OOPS

```

## Config Reference

* __username__ - Your GeoNames API user name, default: `demo`
* __lang__ - Language for names will target this language where possible, default: `en`
* __charset__ - Output character encoding, default: `UTF8`
* __cacheDir__ - Cache directory, default: `NULL`
* __cacheTtl__ - Cache time-to-live (in seconds), default: `NULL`
