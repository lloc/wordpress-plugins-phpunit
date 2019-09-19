<?php

namespace wccta;

class Car {

	protected $data;

	public function __construct( object $data ) {
		$this->data = $data;
	}

	public function get_price() {
		$price = $this->data->price ?? 0;

		return sprintf( '€ %s', number_format_i18n( $price ) );
	}
}