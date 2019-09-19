<?php

namespace wccta;

class Car implements FooterInterface {

	protected $data;

	public function __construct( object $data ) {
		$this->data = $data;
	}

	public function get_price() {
		$price = $this->data->price ?? 0;

		return sprintf( '€ %s', number_format_i18n( $price ) );
	}

	public function info(): void {
		echo "When I grow up I'll be a Ferrari.", PHP_EOL;
	}

}