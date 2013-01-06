<?php
class nFeed 
{
    public static function create($channel, $config)
    {
        $class = 'Feed_' . ucfirst(strtolower($channel));
        if( ! class_exists($class) ) {
            throw new Exception('Unknown channel: ' . $channel);
        }
        return new $class($config);
    }
}
