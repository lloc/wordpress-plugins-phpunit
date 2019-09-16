<?php

namespace tests\wccta;

use Brain\Monkey;
use PHPUnit\Framework\TestCase;

class WcctaTestCase extends TestCase {

	protected function setUp(): void {
		parent::setUp();
		Monkey\setUp();
	}

	protected function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}
}