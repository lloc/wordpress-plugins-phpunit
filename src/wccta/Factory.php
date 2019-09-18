<?php

namespace wccta;

class Factory {

	public static function create( string $json ): Car {
		$data = json_decode( $json );

		return new Car( $data );
	}

}