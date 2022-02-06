<?php

require dirname ( __DIR__ ) . '/src/Config.php';

function result( mixed $value ): void
{
	if ( is_array ( $value ) )
	{
		echo json_encode ( $value, 480 ) . PHP_EOL;
		
		return;
	}
	
	var_export ( $value );
}



$config = new \Nouvu\Config\Config( separator: '.' );

$config -> set( null, [ $config :: class ] );

$config -> set( 'a.b.c.d', true );

result( $config -> get( null ) );
/*
{
    "0": "Nouvu\\Config\\Config",
    "a": {
        "b": {
            "c": {
                "d": true
            }
        }
    }
}
*/

$config -> add( 'a.b.c', [ 'e' => null ] );

result( $config -> has( 'a.b.c.e' ) ); // true



result( $config -> get( null ) );
/*{
    "0": "Nouvu\\Config\\Config",
    "a": {
        "b": {
            "c": {
                "d": true,
                "e": null
            }
        }
    }
}*/