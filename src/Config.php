<?php

declare ( strict_types = 1 );

namespace Nouvu\Config;

use InvalidArgumentException;

final class Config
{
	private mixed $return;
	
	public function __construct ( private array $config = [], private string $separator = '.' )
	{}

	public function set( string | int | null $offset, mixed $value ): void
	{
		$this -> segments( 'set', $offset );
		
		$this -> return = $value;
	}

	public function get( string | int | null $offset, mixed $default = null ): mixed
	{
		try
		{
			$this -> segments( 'get', $offset );
			
			return $this -> return;
		}
		catch ( InvalidArgumentException )
		{
			return $default;
		}
	}
	
	public function add( string | int | null $offset, array $value, bool $before = false ): void
	{
		$this -> segments( 'set', $offset );
		
		if ( ! is_array ( $this -> return ) )
		{
			throw new InvalidArgumentException( '@Nouvu\Config - The final result should be an array to add to it - offset: ' . $offset );
		}
		
		$this -> return = array_merge ( ...match ( $before )
		{
			true => [ $value, $this -> return ],
			false => [ $this -> return, $value ],
		} );
	}
	
	public function has( string | int $offset ): bool
	{
		try
		{
			$this -> segments( 'has', $offset );
			
			return true;
		}
		catch ( InvalidArgumentException )
		{
			return false;
		}
	}
	
	private function segments( string $method, string | int | null $offset ): void
	{
		$this -> return = &$this -> config;
		
		if ( is_null ( $offset ) )
		{
			return;
		}
		
		foreach ( explode ( $this -> separator, ( string ) $offset ) AS $name )
		{
			if ( $method == 'set' || ( isset ( $this -> return[$name] ) || is_array ( $this -> return ) && array_key_exists ( $name, $this -> return ) ) )
			{
				$this -> return = &$this -> return[$name];
			}
			else
			{
				throw new InvalidArgumentException( '@Nouvu\Config - Not found key name - ' . $name );
			}
		}
	}
}
