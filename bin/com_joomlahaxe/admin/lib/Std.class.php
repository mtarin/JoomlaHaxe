<?php

class Std {
	public function __construct(){}
	static function string($s) {
		$GLOBALS['%s']->push("Std::string");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = _hx_string_rec($s, "");
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Std'; }
}
