#silex-imbo
Imbo service provider for Silex

## Installation
Add `"vaffel/silex-imbo": "XXX"` to the composer.json file inside your project and do a `composer install`. Check [packagist.com][packagist.org/packages/vaffel/silex-imbo] for the latest available version.

## Setup instructions
Register the Imbo service provider in your Silex app like this;

```php
$app->register(new ImboServiceProvider(), array(
    'imbo.serverUrls' => ['http://example.net', ...], // Array of urls to imbo installations
    'imbo.publicKey'  => $publicKey,                  // Public key
    'imbo.privateKey' => $privateKey,                 // Private key
));
```

## Usage
After registering the Imbo service provider, the ImboClient instance can be accessed from the `$app` variable like this

```php
$response = $app['imbo']->addImage('/path/to/image.jpg');
```

## Tests
The service provider comes with PHPUnit tests and can be run by doing a `./vendor/phpunit/phpunit/phpunit` inside the silex-imbo folder.

## Documentation
Read the full ImboClient documentation at http://imboclient-php.readthedocs.org/en/latest/

## License
License
Copyright (c) 2014, Kristoffer Brabrand kristoffer@brabrand.no

Licensed under the MIT License