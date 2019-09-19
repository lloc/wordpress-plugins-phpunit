<?php

namespace tests\wccta;

use PHPUnit\Framework\TestCase;
use wccta\Car;

class CarTest extends TestCase {

	public function test_get_price() {
		// Arrange
		$sut = new Car();

		// Act
		$actual = $sut->get_price();

		// Assert
		$this->assertEquals( '€ 14.500', $actual );
	}

}