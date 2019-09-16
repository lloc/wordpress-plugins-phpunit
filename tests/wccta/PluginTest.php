<?php

namespace tests\wccta;

use wccta\Plugin;

class PluginTest extends WcctaTestCase {

	public function test_is_loaded() {
		$test = new Plugin();

		$this->assertTrue( $test->is_loaded() );
	}

}