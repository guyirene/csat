# RLC - CSAT

CSAT - Customer Satisfaction is a php package that adds a survey feature in your application

## Installation 

Install the latest version with 

```bash
$ composer require rlc/csat 
$ php artisan vendor publish or php artisan vendor:publish
	Find Provider: Rlc\Csat\CsatServiceProvider 
$ php artisan migrate 
```

## Basic Usage

```.blade.php
{{ view('csat::layouts\icon') }} 
or
@include('csat.layouts.icon')
```

### Support
https://packagist.org/packages/rlc/csat

### Author

Guy Irene Asidoy - <guyirene.asidoy@robinsonsland.com>

### License

RLC - CSAT is licensed under the MIT License - see the [LICENSE](LICENSE) file for details

