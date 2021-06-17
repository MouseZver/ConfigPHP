<?php

require dirname ( __DIR__ ) . '/src/Config.php';

$config = new \Nouvu\Config\Config( separator: '.' );

print_r ( $config );

$config -> set( callable: fn( &$a ) => $a[] = 1 );

$config -> get( '1.2.3', 'none' );

print_r ( $config );

$config = new \Nouvu\Config\Config( [ '1.1' => 5 ], '.' );

print_r ( $config );

$config -> get( '1.1', 'none' );

print_r ( $config );