<?php

namespace tests\wccta;

use PHPUnit\Framework\TestCase;
use wccta\Car;

class CarTest extends TestCase {

	public function test_getPrice() {
		// Arrange
		$json = json_encode( [ 'price' => 14500 ] );
		$sut  = new Car( $json );

		// Act
		$actual = $sut->getPrice();

		// Assert
		$this->assertEquals( '€ 14.500', $actual );
	}

}