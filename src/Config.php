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
	
	public function __construct ( array $config = [], string $separator = '\\' )
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
		$this -> segments( $string );
		
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
}
