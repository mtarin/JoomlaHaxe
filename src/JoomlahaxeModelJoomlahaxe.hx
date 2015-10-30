package ;


import php.Lib;
//import sys.db.Connection;
//import Entry;

@:build(PHP.generateExtern("legacy/model/legacy.php")) 
class JModelLegacy implements Dynamic { }

//@:build(PHP.generateExtern("joomla/database/query/mysqli.php")) 
//class JDatabaseQueryMysqli implements Dynamic { }

//this macro creates a class field which conflicts with the above one, so I'm not using it
//@:build(PHP.generateExtern("joomla/database/driver/mysqli.php")) 
//class JDatabaseDriverMysqli implements Dynamic { }


class JoomlahaxeModelJoomlahaxe extends JModelLegacy
{
	var msg:String;
	//var db:JDatabaseDriverMysqli; not used; see macro note above
	//var query:JDatabaseQueryMysqli;
	var results:Array<Dynamic>;
	public static function main () {
		
		new JoomlahaxeModelJoomlahaxe ();
		
	}
    public function new()
    {
		var config;
		config=untyped{
			__call__("Array","[\"name\":\"Joomlahaxe\"]");
			
		}
		super(config);
		untyped __call__("defined('_JEXEC') or die","no joomla here");

		
	}
	
	//getMsg() gets called when the view does this.get('Msg');
	//Joomla looks for this function name based on the parameter passed
	
	public function getMsg() 
	{
		if (msg==null) 
		{
			msg = 'Results:<br />';
		

			
			//read more at https://docs.joomla.org/Selecting_data_using_JDatabase
			//I didn't make an extern for JFactory because it was requiring some hand-editing at lines 31 & 74
			var db = untyped __call__('JFactory::getDbo'); //creates a JDatabaseDriverMysqli Object

			// Create a new query object.
			var query = db.getQuery(true);


			// Select all records from the user profile table where key begins with "custom.".
			// Order it by the ordering field.
			var a=db.quoteName(['id', 'name', 'details', 'enabled']);
			query.select(a);
			
			
			//untyped __php__("$query->from($db->quoteName('#__joomlahaxe'));");
			//untyped __php__("print_r($db->quoteName('#__joomlahaxe'))");
			
			query.from('#__joomlahaxe');  //also works as '`#__joomlahaxe`'
			//db.quoteName('#__joomlahaxe') doesn't work
			
			
			query.where('`name` LIKE "%example%"');
			
			//want to see the raw query?
			//untyped __php__("print_r($query->__toString())");
			
			
			query.order('\'ordering ASC\'');

			// Reset the query using our newly populated query object.
			db.setQuery(query);

			// The results come as a list of php stdClass objects, and must be converted with "toHaxeArray" in order to use in Haxe.
			// Look at http://api.haxe.org/php/Lib.html for more useful such functions.
			results = Lib.toHaxeArray(db.loadObjectList());

			for (i in results) {
				msg+=i.id+"<br />";
				msg+=i.name+"<br />";
				msg+=i.details+"<br />";
				msg+=i.enabled+"<br />"+"<br />";
			}


		}
		
			
		return msg;
	}
	
}
