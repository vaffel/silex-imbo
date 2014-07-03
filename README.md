Imbo service provider for Silex
============================
Service provider making the Imbo accessible to your Silex application.

[![Build Status](https://travis-ci.org/vaffel/silex-imbo.svg?branch=master)](https://travis-ci.org/vaffel/silex-imbo)

## Installation
Add `"vaffel/silex-imbo": "XXX"` to the composer.json file inside your project and do a `composer install`. Check [Composer][1] for the latest available version.

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
After registering the Imbo service provider, the ImboClient instance can be accessed from the `$app` variable like this;

```php
$response = $app['imbo']->addImage('/path/to/image.jpg');
```

## Tests
The service provider comes with PHPUnit tests and can be run by doing a `./vendor/phpunit/phpunit/phpunit` inside the silex-imbo folder.

## Documentation
Read the full ImboClient documentation at [imboclient-php.readthedocs.org][2].

## License
License
Copyright (c) 2014, Kristoffer Brabrand kristoffer@brabrand.no

Licensed under the MIT License

[1]: http://packagist.org/packages/vaffel/silex-imbo
[2]: http://imboclient-php.readthedocs.org/en/latest/
