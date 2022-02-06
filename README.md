[![Latest Unstable Version](https://poser.pugx.org/Nouvu/config/v)](https://packagist.org/packages/nouvu/config) [![License](https://poser.pugx.org/nouvu/config/license)](https://packagist.org/packages/nouvu/config)

> composer require nouvu/config

| Method | Description |
| ------ | ------ |
| set( string &#124; int &#124; null $offset, mixed $value ): void | set values |
| add( string &#124; int &#124; null $offset, array $value ): void | add values |
| get( string &#124; int &#124; null $offset, mixed $default = null ): mixed | get value(s) |
| has( string &#124; int $offset ): bool | has offset |

```php
// [ 'nouvu/config' ]
$config = new \Nouvu\Config\Config( config: [ 'nouvu/config' ], separator: '.' );

// [ 'nouvu/config', 'Nouvu\\Config\\Config' ]
$config -> set( null, [ $config :: class ] );

// [ 'nouvu/config', 'Nouvu\\Config\\Config', 'a' => 'b' ]
$config -> add( null, [ 'a' => 'b' ] );

$config -> get( 'a' ); // b
```