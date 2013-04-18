<?php
/**
* Web service methods
*/
class Application_Model_MyWebService
{
    /**
    * Get the server date and time
    *
    * @return  string
    */
    public function getDate()
    {
        return date('c');
    }
    
    /**
    * Get a nicely formatted string of a person's age
    *
    * @param   string  $name   The name of a person
    * @param   int     $age    The age of a person
    * @return  string
    */
    public function getAgeString($name, $age)
    {
        return sprintf('%s tiene %d años de edad', $name, $age);
    }
}

