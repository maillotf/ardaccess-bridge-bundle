# Complex types

## <a name="apicriterion"></a>APICriterion

Search criteria

**Valid operator by types:**
- integer: "=", "!=", "<", "<=", ">", ">=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif" or "nsif".
- string: "=", "!=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif", "nsif", "like" or "nlike".
- boolean: "=" or "!=".
- timestamp (date) : "=", "!=", "<", "<=", ">", ">=", "isn" or "isnn"

**Logical operators:**
- "and" 
- "or"

**Special operators descriptions:**
- isn is for a IS NULL search (value will not be used),
- isnn is for IS NOT NULL search (value will not be used),
- in is for IN search (value is a list),
- nin is for NOT IN search (value is a list),
- fis is for FIND_IN_SET search,
- nfis is for NOT FIND_IN_SET search,
- sif is for FIND_IN_SET search (value is a list),
- nfis is for NOT FIND_IN_SET search (value is a list),
- like is for LIKE search (% can be used as * joker),
- nlike is for NOT LIKE search (% can be used as * joker).
- and, or: value and index are not used, and subcriterie must be setted. It's like grouping subcriterie into parenthesis.

**Example:**
```php
//Find carrier
$criterions = $aas->creator
		->newCriterion('firstname', '=', $firsname)
		->addCriterion()
		->newCriterion('lastname', '=', $lastname)
		->addCriterion()
		->getCriterionsArray();
$carriers = $aas->carrier->ListCarriers(null, $criterions);
```

```php
public function test(ArdaccessService $aas)
{
	$criterions = $aas->creator
				->newCriterion('date', '>=', $startTimestamp)
				->addCriterion()
				->newCriterion('date', '<', $endTimestamp)
				->addCriterion()
				->newCriterion('eventtype', 'nin', '10, 20')
				->addCriterion()
				->getCriterionsArray();
	$page = 0;
	$events = $aas->supervision->ListEvents(null, $criterions, $aas->creator->setPagination($page)->getPagination());
}
```

## <a name="apipagination"></a>APIPagination

Pagination list parameters
**Example:**
```php
public function test(ArdaccessService $aas)
{
	$page = 0;
	$maxpage = 10;
	while ($page < $maxpage)
	{
		++$page;
		$ap = $aas->access->ListAccessPoints(null, null, $aas->creator->setPagination($page)->getPagination());
		if ($page == 1)
			$maxpage = ceil($ap->count / 25);
		//Your logic...
	}
	//Your logic...
}
```
