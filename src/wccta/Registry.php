<?php

namespace wccta;

class Registry {

	/**
	 * @var array
	 */
	private $vars = [];

	/**
	 * @codeCoverageIgnore
	 *
	 * @return Registry
	 */
	public static function create() {
		static $instance = null;

		if ( null === $instance ) {
			$instance = new self;
		}

		return $instance;
	}

	/**
	 * @param string $key
	 * @param mixed $val
	 */
	public function __set( string $key, $val ) {
		$this->vars[ $key ] = $val;
	}

	/**
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function __get( string $key ) {
		if ( isset( $this->vars[ $key ] ) ) {
			return $this->vars[ $key ];
		}

		throw new \OutOfBoundsException( $key );
	}

}
