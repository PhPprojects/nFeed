<?php
class Formatter_Format_JSON implements Formatter_Interface
{
    public function format($data)
    {
        $json = json_decode($data);
        switch(json_last_error())
        {
            case JSON_ERROR_DEPTH:
                $error =  ' - Maximum stack depth exceeded';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = ' - Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                $error = ' - Syntax error, malformed JSON';
                break;
            case JSON_ERROR_NONE:
            default:
                $error = '';                    
        }
        if (!empty($error)) {
            throw new Formatter_Exception('JSON Error: '.$error);        
        }
        return $json;
    }
}

