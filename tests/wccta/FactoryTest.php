<?php

namespace tests\wccta;

use Brain\Monkey\Actions;
use wccta\Car;
use wccta\Factory;

class FactoryTest extends WcctaTestCase {

	/**
	 * @test
	 */
	public function create() {
		Actions\expectAdded( 'wp_footer' );

		$data = json_encode( [ 'price' => 14500 ] );
		$sut  = ( new Factory() )->create( $data );

		// $this->assertTrue( has_action('wp_footer', [ $sut, 'info' ] ) );
		$this->assertInstanceOf( Car::class, $sut );
	}

}