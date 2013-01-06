<?php
define('APPLICATION_PATH', dirname(__FILE__) . '/../library');
require(APPLICATION_PATH . '/loader.php');
set_include_path(implode( PATH_SEPARATOR, array( APPLICATION_PATH, APPLICATION_PATH . '/nFeed' ) ));
Loader::init();



$config = new Zend_Config_Xml(APPLICATION_PATH . '/../config/config.xml');
$nFeed  = new nFeed();
$feeder = $nFeed->create('hurriyet', $config);
$types = $feeder->getTypes();
$feeds = $feeder->getFeeds($types->get('gundem'));
foreach($feeds as $feed) {
    echo $feed->title() . PHP_EOL;
    echo $feed->description() . PHP_EOL;
    echo PHP_EOL;
}
