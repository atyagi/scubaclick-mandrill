ScubaClick Mandrill
==================

Provides a Guzzle service description to access the [Mandrill](https://mandrillapp.com) API.

General Installation
--------------------

Install by adding the following to the require block in composer.json:
```
"scubaclick/mandrill": "dev-master"
```

Then run `composer update`.

Laravel-specific Installation
-----------------------------

Add the following in app/config/app.php to the service providers array:
```php
'ScubaClick\Mandrill\Providers\LaravelServiceProvider',
```

Then add to the aliases array the following:
```php
'Mandrill' => 'ScubaClick\Mandrill\Facades\LaravelFacade',
```

To change the configuration values, run the following command in the console:
```php
php artisan config:publish scubaclick/mandrill
```

Usage
-----

```php
$response = \Mandrill::sendEmail([
	'message' => [
		// message configuration
	],
	'async' => true,
]);
```

Documentation
-------------

For the full documentation on Mandrill, please visit the [API Docs](https://mandrillapp.com/api/docs/)

License
-------

ScubaClick Mandrill is licenced under the MIT license.
