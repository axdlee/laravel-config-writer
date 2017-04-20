## Laravel Config Writer For Laravel 5.3 + 5.4+

Write to Laravel Config files and maintain file integrity.

This library can support Lravel 5.3+.

This library is an extension of the Config component used by Laravel. It adds the ability to write to configuration files.

You can rewrite array values inside a basic configuration file that returns a single array definition (like a Laravel config file) whilst maintaining the file integrity, leaving comments and advanced settings intact.

The following value types are supported for writing: strings, integers, booleans and single-dimension arrays.

### Usage Instructions

Add this to `config/app.php` under the 'providers' key:

```php
Axdlee\Config\ConfigServiceProvider::class,
```

You can now write to config files:

```php
Config::write('app.url', 'http://xdlee.com');
```

### Usage outside Laravel

The `Rewrite` class can be used anywhere.

```php
$writeConfig = new Axdlee\Config\Rewrite;
$writeConfig->toFile('path/to/config.php', [
    'item' => 'new value',
    'nested.config.item' => 'value',
    'arrayItem' => ['Single', 'Level', 'Array', 'Values'],
    'numberItem' => 3,
    'booleanItem' => true
]);
```
