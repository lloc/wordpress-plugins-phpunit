<?php

namespace tests\wccta;

use Brain\Monkey\Functions;
use wccta\Car;

class CarTest extends WcctaTestCase {

	public function getData() {
		return [
			[ 14500, '14.500', '€ 14.500' ],
			[ 12345.67, '12345', '€ 12345' ],
			[ null, '0', '€ 0' ],
		];
	}

	/**
	 * @dataProvider getData
	 */
	public function test_getPrice( $intPrice, $stringPrice, $expected ) {
		// Arrange
		Functions\expect( 'number_format_i18n' )->andReturn( $stringPrice );

		$json = json_encode( [ 'price' => $intPrice ] );
		$sut  = new Car( $json );

		// Act
		$actual = $sut->get_price();

		// Assert
		$this->assertEquals( $expected, $actual );
	}

}
