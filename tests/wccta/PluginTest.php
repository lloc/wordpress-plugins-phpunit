<?php

namespace tests\wccta;

use wccta\Locale;
use wccta\Plugin;

class PluginTest extends WcctaTestCase {

	public function test_get_region_code() {
		$code   = 'it_IT';
		$locale = \Mockery::mock( Locale::class );
		$locale->shouldReceive( 'get' )->andReturn( $code );

		$sut = new Plugin( $locale );

		$this->assertEquals( $code, $sut->get_region_code() );
	}

}