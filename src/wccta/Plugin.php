<?php

namespace wccta;

class Plugin {

	public $locale;

	public function __construct( Locale $locale ) {
		$this->locale = $locale;
	}

	/**
	 * @codeCoverageIgnore
	 */
	public static function create(): self {
		$locale = new Locale();

		return new self( $locale );
	}

	public function get_region_code() {
		return $this->locale->get();
	}

}