<?php 

define("DB_HOST", "127.0.0.1");
define("DB_NAME", 'parks_db');
define("DB_USER", "parks_user");
define("DB_PASS", "codeup");

class Model {

    protected static $dbc;
    protected static $table;

    public $attributes = array();
    /*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    static function dbConnect()
    {
        if (!self::$dbc)
        {

			self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
			self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo self::$dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS);
        }
    }

    /*
     * Get a value from attributes based on name
     */
    public function __get($name)
    {
        // @TODO: Return the value from attributes with a matching $name, if it exists
        if (array_key_exists($name, $this->attributes)) {
        return $this->attributes[$name];
    }

    return null;
    }

    /*
     * Set a new attribute for the object
     */
    public function __set($name, $value)
    {
        // @TODO: Store name/value pair in attributes array
        $this->attributes[$name] = $value;
    }

    /*
     * Persist the object to the database
     */
    public function save()
    {
        // @TODO: Ensure there are attributes before attempting to save
        // @TODO: Perform the proper action - if the `id` is set, this is an update, if not it is a insert
        // @TODO: Ensure that update is properly handled with the id key
        // @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        // @TODO: Use prepared statements to ensure data security
    	if (isset($this->attributes)){
    		$stmt = $this->dbc->prepare("SELECT * FROM " . static::$table . " WHERE id= :id");
    		$stmt->bindValue(":table", $static->table, PDO::PARAM_STR);
    		$stmt->bindValue(":id", $this->attributes["id"], PDO::PARAM_INT);
    		
    		$results = 	$stmt->execute();

    		if($results){
    			foreach ($attributes as $key => $value) {
    				if ($key != 'id'){
    					$stmt = $this->dbc->prepare("UPDATE :table SET :key = :value");

    					$stmt->bindValue(":table", $static->table, PDO::PARAM_STR);
    					$stmt->bindValue(":key", $key, PDO::PARAM_STR);
    					$stmt->bindValue(":value", $value, PDO::PARAM_INT);

    					$stmt->execute();
    				}
    			}
    		} else {


    		}
    	}
    }
     

    /*
     * Find a record based on an id
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();
        // @TODO: Create select statement using prepared statements
        $stmt = self::$dbc->prepare("SELECT * FROM " . static::$table . " WHERE id= :id");
        $stmt->bindValue(":table", self::$table, PDO::PARAM_STR);
    	$stmt->bindValue(":id", $id, PDO::PARAM_INT);
    	$stmt->execute();
        // @TODO: Store the resultset in a variable named $result
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // The following code will set the attributes on the calling object based on the result variable's contents

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    /*
     * Find all records in a table
     */
    public static function all()
    {
        self::dbConnect();
        // @TODO: Learning from the previous method, return all the matching records
        return self::$dbc->query("SELECT * FROM " . static::$table . ';')->fetchAll(PDO::FETCH_ASSOC);
    }

}

$test = new Model;
$test->dbConnect();

?>