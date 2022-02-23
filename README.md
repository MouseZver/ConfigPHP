[![Latest Unstable Version](https://poser.pugx.org/Nouvu/config/v)](https://packagist.org/packages/nouvu/config) [![License](https://poser.pugx.org/nouvu/config/license)](https://packagist.org/packages/nouvu/config)

> composer require nouvu/config

| Method | Description |
| ------ | ------ |
| set( string \| int \| null $offset, mixed $value ): void | set values |
| add( string \| int \| null $offset, array $value, bool $before = false ): void | add values |
| get( string \| int \| null $offset, mixed $default = null ): mixed | get value(s) |
| has( string \| int $offset ): bool | has offset |

```php
// [ 'nouvu/config' ]
$config = new \Nouvu\Config\Config( config: [ 'nouvu/config' ], separator: '.' );

// [ 'nouvu/config', 'Nouvu\\Config\\Config' ]
$config -> set( null, [ $config :: class ] );

// [ 'nouvu/config', 'Nouvu\\Config\\Config', 'a' => 'b' ]
$config -> add( null, [ 'a' => 'b' ] );

$config -> get( 'a' ); // b
```