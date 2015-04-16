<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        // TODO: Fill in this function
        return isset($_REQUEST[$key]);
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default=null)
    {
        // TODO: Fill in this function
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }

    public static function getString($key, $min=null, $max=100000)
    {
        // var_dump(self::get($key));
        // strlen ( string $string )
        if (!is_string(self::get($key)) || empty(self::get($key))) {
            throw new Exception('Input error related to string.');
        } if (strlen(self::get($key)) > $max || strlen(self::get($key)) < $min){
            throw new LengthException('There is a length exception.');
        }
        return self::get($key);
    } 

    // If a number is less than $min or larger than $max, throw a RangeException

      public static function getNumber($key, $min=null)
    {
        if (intval(self::get($key)) == 0){
            throw new Exception('Input error related to integer.');
        } elseif (intval(self::get($key)) < $min){
            throw new RangeException('number is out of range.');
        }
        return intval(self::get($key));
    } 

    // $this->firstName = trim($firstName);

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}