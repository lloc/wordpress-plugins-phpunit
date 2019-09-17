<?php

namespace tests\wccta;

use wccta\Registry;

class RegistryTest extends WcctaTestCase {

	public function get_sut() {
		return new Registry();
	}

	public function test_get() {
		$test = new Registry();

		$this->expectException( \OutOfBoundsException::class );

		$test->a;
	}

	public function test_set() {
		$test    = new Registry();
		$test->a = 'b';

		$this->assertEquals( 'b', $test->a );
	}

}