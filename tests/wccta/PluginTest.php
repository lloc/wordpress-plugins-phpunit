<?php

namespace tests\wccta;

use PHPUnit\Framework\TestCase;
use Brain\Monkey;
use wccta\Plugin;

class PluginTest extends TestCase {

	public function test_is_loaded() {
		$test = new Plugin();

		$this->assertTrue( $test->is_loaded() );
	}

	protected function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

}