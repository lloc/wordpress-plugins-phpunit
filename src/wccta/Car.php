<?php

namespace wccta;

class Car {

	protected $data;

	public function __construct( string $json ) {
		$this->data = json_decode( $json );
	}

	public function get_price() {
		$price = $this->data->price ?? 0;

		return sprintf( '€ %s', number_format_i18n( $price ) );
	}
}