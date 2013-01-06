<?php
class ArrayList implements Iterator
{
    private $_collection;

    public function __construct()
    {
        $this->_collection = array();
        $this->rewind();
    }

    public function current()
    {
        return current( $this->_collection );
    }

    public function key()
    {
        return key($this->_collection);
    }

    public function next()
    {
        next($this->_collection);
    }

    public function rewind()
    {
        reset($this->_collection);
    }

    public function valid()
    {
        return isset( $this->_collection[ $this->key() ] );
    }

    public function add($key = '', $value)
    {
        if($key) {
            $this->_collection[$key] = $value;
        } else {
            $this->_collection[] = $value;
        }
    }

    public function remove($key)
    {
        $this->_collection[$key] = null;
    }

    public function get($key)
    {
        if( ! isset( $this->_collection[ $key ] ) ) {
            return false;
        }
        return $this->_collection[ $key ];
    }

    public function toArray()
    {
        return $this->_collection;
    }
}
