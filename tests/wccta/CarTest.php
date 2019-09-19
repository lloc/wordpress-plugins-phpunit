<?php

namespace tests\wccta;

use Brain\Monkey\Functions;
use wccta\Car;

class CarTest extends WcctaTestCase {

	public function get_data() {
		return [
			[ 14500, '14.500', '€ 14.500' ],
			[ 12345.67, '12345', '€ 12345' ],
			[ null, '0', '€ 0' ],
		];
	}

	/**
	 * @dataProvider get_data
	 */
	public function test_get_price( $int_price, $string_price, $expected ) {
		// Arrange
		Functions\expect( 'number_format_i18n' )->andReturn( $string_price );

		$json = (object) [ 'price' => $int_price ];
		$sut  = new Car( $json );

		// Act
		$actual = $sut->get_price();

		// Assert
		$this->assertEquals( $expected, $actual );
	}

}
