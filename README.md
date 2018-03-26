# RawView

RawView for Laravel 5.5+ gives an ability to compile a view from the raw HTML code with Blade directives without creating a view file.

## Install

Via Composer

``` bash
$ composer require sergant210/laravel-raw-view
```
After that the view_raw function will be available. It works like the view function but you must specify the HTML code instead of the name of the view.

## Usage

``` php
$output = '';
$tpl = '<li> {{ $item["name"] }} </li>';
foreach($items as $item) {
    $output .= view_raw($tpl, compact('item'))->render();
}
$output = '<ul>' . $output . '</ul>';
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.