<?php

namespace tests\wccta;

use PHPUnit\Framework\TestCase;
use wccta\Car;

class CarTest extends TestCase {

	public function test_getPrice() {
		// Arrange
		$sut = new Car();

		// Act
		$actual = $sut->getPrice();

		// Assert
		$this->assertEquals( '€ 14.500', $actual );
	}

}