<?php

class haxe_ds_IntMap implements IMap, IteratorAggregate{
	public function __construct(){}
	public $h;
	public function iterator() {
		$GLOBALS['%s']->push("haxe.ds.IntMap::iterator");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = new _hx_array_iterator(array_values($this->h));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getIterator() {
		$GLOBALS['%s']->push("haxe.ds.IntMap::getIterator");
		$__hx__spos = $GLOBALS['%s']->length;
		{
			$tmp = $this->iterator();
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	function __toString() { return 'haxe.ds.IntMap'; }
}
