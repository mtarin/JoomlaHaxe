<?php

class JoomlahaxeModelJoomlahaxe extends JModelLegacy {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$config = null;
		$config = Array("[\"name\":\"Joomlahaxe\"]");
		parent::__construct($config);
		defined('_JEXEC') or die("no joomla here");
	}}
	public $msg;
	public $results;
	public function getMsg() {
		if(_hx_field($this, "msg") === null) {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$a = $db->quoteName((new _hx_array(array("id", "name", "details", "enabled"))));
			$query->select($a);
			$query->from("#__joomlahaxe");
			$query->order("'ordering ASC'");
			$db->setQuery($query);
			$this->msg = $db->loadObjectList();
		}
		return $this->msg;
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
	static function main() {
		new JoomlahaxeModelJoomlahaxe();
	}
	static $__properties__ = array("get_event_clean_cache = null" => "get_event_clean_cache = null","get_state" => "get_state","get_option = null" => "get_option = null","get_name" => "get_name","get__db" => "get__db","get___state_set = null" => "get___state_set = null");
	function __toString() { return 'JoomlahaxeModelJoomlahaxe'; }
}
