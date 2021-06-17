<?php

declare ( strict_types = 1 );

/*
	@ Author: MouseZver
	@ Email: mouse-zver@xaker.ru
	@ php-version 8.0
*/

namespace Nouvu\Config;

final class Config
{
	private $return;
	
	public function __construct ( private array $config = [], private string $separator = '.' )
	{}

	public function set( string $string = null, callable $callable ): void
	{
		$this -> segments( $string );
		
		$callable( $this -> return );
	}

	public function get( string $string = null, mixed $default = null ): mixed
	{
		$this -> segments( $string );
		
		return $this -> return ??= $default;
	}
	
	private function segments( string | null $string ): void
	{
		$this -> return = &$this -> config;
		
		if ( is_null ( $string ) )
		{
			return;
		}
		
		foreach ( explode ( $this -> separator, $string ) AS $name )
		{
			$this -> return = &$this -> return[$name];
		}
	}
}
