<?php

namespace wccta;

class Locale {

	/**
	 * @codeCoverageIgnore
	 */
	public function get() {
		return get_locale();
	}

}