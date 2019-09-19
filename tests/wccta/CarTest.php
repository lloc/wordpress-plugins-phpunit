<?php

namespace tests\wccta;

use PHPUnit\Framework\TestCase;
use wccta\Car;

class CarTest extends TestCase {

	public function test_get_price() {
		// Arrange
		$json = json_encode( [ 'price' => 14500 ] );
		$sut  = new Car( $json );

		// Act
		$actual = $sut->get_price();

		// Assert
		$this->assertEquals( '€ 14.500', $actual );
	}

}
