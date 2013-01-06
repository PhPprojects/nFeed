<?php
class Formatter_Format_XML implements Formatter_Interface
{
    public function format($data)
    {
        try {
            $xml = new SimpleXMLElement($data);
            return $xml;
        } catch(Exception $e) {
            throw new Formatter_Exception($e->getMessage() );
        }
    }
}
