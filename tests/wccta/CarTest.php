<?php

namespace tests\wccta;

use Brain\Monkey;
use Brain\Monkey\Functions;
use wccta\Car;

class CarTest extends WcctaTestCase {

	public function test_getPrice() {
		// Arrange
		Functions\expect( 'number_format_i18n' )->andReturn( '14.500' );

		$json = json_encode( [ 'price' => 14500 ] );
		$sut  = new Car( $json );

		// Act
		$actual = $sut->getPrice();

		// Assert
		$this->assertEquals( '€ 14.500', $actual );
	}

}
