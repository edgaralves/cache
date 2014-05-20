Cache class's
=========

Simple Usage
--------------

```php
<?php
$results = \cache\Cache::get('cacheKey');
if ($results) {
	return $results;
}

$results = array(0,1,2,3,4);

\cache\Cache::set('cacheKey', $results, 300);
```