# Mpay24 plugin for CakePHP

CakePHP wrapper for Mpay24's official PHP SDK Client [MPAY24's official PHP SDK](https://github.com/mpay24/mpay24-php)

* Mpay24 GitHub: https://github.com/mpay24/mpay24-php
* Mpay24 Docs: https://docs.mpay24.com/docs
* Mpay24 Demo: https://docs.mpay24.com/docs/get-started


## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require fm-labs/cakephp-mpay24
```


## Configuration

```php
// config/mpay24.php

<?php
return [
    'Mpay24' => [
        'production' => [
            'merchantId' => '',
            'merchantPassword' => '',
            'useTestSystem' => false,
            'debug' => true,
        ],

        'testing' => [
            'merchantId' => '',
            'merchantPassword' => '',
            'useTestSystem' => true,
            'debug' => true,
        ]
    ]
];
```


## Usage

### Api Client

```php
try {
    $mpay24 = new \FmLabs\Mpay24\Lib\Mpay24Client('testing');
    
    $mdxi = new \FmLabs\Mpay24\Lib\Mpay24Order()
    // ... setup mdxi order ...

    if (!$mdxi->validate()) {
        throw new \RuntimeException('Failed to validate MDXI.');
    }

    $mpay24Response = $mpay24->paymentPage($mdxi);
    $paymentPageURL = $mpay24Response->getLocation(); // get redirect location to the payment page
    if ($paymentPageURL) {
        // ... redirect user to payment page ... 
    }
} catch (\Exception $ex) {
    debug("Something went wrong: " . $ex->getMessage());
}
```

## Testdata

All testdata in the official docs:
https://docs.mpay24.com/docs/test-data

Credit cards

Test data:

    Mastercard card number: 5555444433331111
    Visa card number: 4444333322221111
    Expiry date: arbitrary, see Test scenarios below

Test scenarios:
Various scenarios results can be created by providing different expiry dates of the credit card for brand VISA and MASTERCARD:

| Expiry | date month | 	status         | 	returnCode | 	errNo                            | 	errText |
|--------|------------|-----------------|-------------|-----------------------------------|----------|
| 01     | 	ERROR     | 	DECLINED       | 	1          |                                   |          |
| 02     | 	ERROR     | 	EXTERNAL_ERROR | 	100        | 	Karte abgelaufen (card expired). |          |
| 03     | 	ERROR     | 	EXTERNAL_ERROR | 	100        |                                   |          |
| 04     | 	ERROR     | 	EXTERNAL_ERROR | 	100        |                                   |          |
| 05     | 	OK        | 	OK             |             |                                   |          |
| \>= 06 | 	OK        | 	REDIRECT	      |             |                                   |          |

