# Documentation
[GeoNames Library](../README.md) &nbsp; » &nbsp;
[Docs](./Docs.md) &nbsp; » &nbsp;
API Reference: Search

---

## Search

This API implements the Search specification [documented here](https://www.geonames.org/export/geonames-search.html), consider the following example.

**List all provinces in South Africa (ZA)**

```
$parameters = [
	'featureCode' => 'ADM1',  // First-order administrative division
	'country' => 'ES',        // Countries
];

$results = $api->search($parameters);

foreach ($results['geonames'] as $result) {
	echo implode("\t", [
		$result['geonameId'],
		$result['adminCode1'],
		$result['name'],
	]) . PHP_EOL;
}

// Output

972062  02      KwaZulu-Natal
967573  03      Orange Free State
1085593 05      Eastern Cape
1085596 08      Northern Cape
1085597 09      Limpopo
1085598 10      North West
1085599 11      Western Cape
1085595 07      Mpumalanga
1085594 06      Gauteng
```
