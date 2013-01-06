<?php
class Loader
{
  public function __construct()
  {
    $this->registerAutoloader();
  }

  public static function init()
  {
    return new self;
  }

  private function registerAutoloader()
  {
    return spl_autoload_register(array(__CLASS__, 'includeClassFile'));
  }

  public function includeClassFile($class)
  {
    require_once(        strtr($class, '_\\', '//') . '.php');
  }
}
?>
