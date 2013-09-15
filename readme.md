ScubaClick Mandrill
==================

API wrapper for Mandrill via Guzzle

Installation
------------

Install by adding the following to the require block in composer.json:
```
"scubaclick/mandrill": "dev-master"
```

Then add the following in app/config/app.php to the service providers array:
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

Documentation
-------------

For the full documentation on Mandrill, please visit the [API Docs](https://mandrillapp.com/api/docs/)

License
-------

ScubaClick Mandrill is licenced under the MIT license.
