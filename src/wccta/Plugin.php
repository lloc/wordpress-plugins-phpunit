<?php

namespace wccta;

class Plugin {

	/**
	 * @codeCoverageIgnore
	 */
	public static function create(): self {
		$obj = new self();

		// Do some things with $obj

		return $obj;
	}

	public function is_loaded() {
		return true;
	}

}