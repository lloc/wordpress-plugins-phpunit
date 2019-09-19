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
	public function test_getPrice( $intPrice, $stringPrice, $expected ) {
		// Arrange
		Functions\expect( 'number_format_i18n' )->andReturn( $stringPrice );

		$obj = (object) [ 'price' => $intPrice ];
		$sut = new Car( $obj );

		// Act
		$actual = $sut->get_price();

		// Assert
		$this->assertEquals( $expected, $actual );
	}

	public function test_info() {
		$string = "When I grow up I'll be a Ferrari." . PHP_EOL;
		$obj    = new \stdClass();
		$sut    = new Car( $obj );

		$this->expectOutputString( $string );
		$sut->info();
	}

}
