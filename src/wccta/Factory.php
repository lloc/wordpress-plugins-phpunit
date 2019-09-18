<?php

namespace wccta;

class Factory {

	public static function create( string $json ): FooterInterface {
		$data = json_decode( $json );
		$obj  = new Car( $data );

		/**
		 * This will be hart to remove ... use __CLASS__ when possible
		 */
		add_action( 'wp_footer', [ $obj, 'info' ] );

		return $obj;
	}

}