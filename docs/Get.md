# Documentation
[GeoNames Library](../README.md) &nbsp; » &nbsp;
[Docs](./Docs.md) &nbsp; » &nbsp;
API Reference: Get

---

## Get

This API implements the Search specification [documented here](https://www.geonames.org/export/web-services.html#get), consider the following example.

**Get info for Bristol, UK (2654675)**

```

$parameters = [
	'geonameId' => '2654675',  // geonamesId for Bristol, GB
	'lang' => 'el',            // Greek names
];

$lookup = $api->get($parameters);

print_r([
	'timeZoneId' => $lookup['timezone']['timeZoneId'] ?? null,
	'name' => $lookup['name'] ?? null,
	'asciiName' => $lookup['asciiName'] ?? null,
	'toponymName' => $lookup['toponymName'] ?? null,
	'countryCode' => $lookup['countryCode'] ?? null,
	'adminCode1' => $lookup['adminCode1'] ?? null,
	'adminCode2' => $lookup['adminCode2'] ?? null,
	'adminName1' => $lookup['adminName1'] ?? null,
	'adminName2' => $lookup['adminName2'] ?? null,
	'lat' => $lookup['lat'] ?? null,
	'lng' => $lookup['lng'] ?? null,
]);

// Output

Array
(
    [timeZoneId] => Europe/London
    [name] => Μπρίστολ
    [asciiName] => Bristol
    [toponymName] => Bristol
    [countryCode] => GB
    [adminCode1] => ENG
    [adminCode2] => B7
    [adminName1] => Αγγλία
    [adminName2] => Μπρίστολ
    [lat] => 51.45523
    [lng] => -2.59665
)
```
