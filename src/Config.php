<?php

declare ( strict_types = 1 );

/*
	@ Author: MouseZver
	@ Email: mouse-zver@xaker.ru
	@ php-version 7.4
*/

namespace Nouvu\Config;

final class Config
{
	private string $separator;
	
	private array $config;
	
	private $return;
	
	private array $cache = [];
	
	public function __construct ( array $config = [], string $separator = '.' )
	{
		$this -> config = $config;
		
		$this -> separator = $separator;
	}

	public function set( string $string = null, callable $callable )
	{
		$this -> segments( $string );
		
		$callable( $this -> return );
	}

	public function get( string $string = null, $default = null )
	{
		if ( array_key_exists ( $string, $this -> cache ) )
		{
			return $this -> cache[$string];
		}
		
		$this -> segments( $string );
		
		$this -> cache( $string, $this -> return ?? $default );
		
		return $this -> return ?? $default;
	}
	
	private function segments( ?string $string ): void
	{
		$this -> return = &$this -> config;
		
		foreach ( explode ( $this -> separator, $string ) AS $name )
		{
			$this -> return = &$this -> return[$name];
		}
	}
	
	private function cache( ?string $string, $value ): void
	{
		if ( ! is_null ( $string ) )
		{
			$this -> cache[$string] = $value;
		}
	}
}
