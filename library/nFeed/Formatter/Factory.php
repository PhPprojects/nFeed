<?php
class Formatter_Factory
{
    public static function create($type)
    {
        $class = 'Formatter_Format_' . strtoUpper($type);
        if( ! class_exists($class) ) {
            throw new Formatter_Exception('Unknown formatter :' . $type);
        }
        return new $class;
    }
}
