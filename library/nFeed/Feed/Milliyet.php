<?php
class Feed_Milliyet extends Feed_Abstract
{
    protected $_channel = 'milliyet';

    protected function _getTypes()
    {
        $types      = $this->_config->{$this->_channel}->types;
        $collection = new ArrayList();

        foreach($types->toArray() as $type => $typeUrl) {
            $collection->add($type, $typeUrl);
        }

        return $collection;
    }

    protected function _getFeeds($data)
    {
        $collection = new ArrayList();

        foreach( $data->channel->item as $item ) {
            $feed = new Feed( trim(str_replace(array(PHP_EOL, "\t"), ' ', (string)  $item->title)), 
                    trim(str_replace(array(PHP_EOL, "\t"), ' ', strip_tags( (string) $item->description))), 
                    (string) $item->link);
            $collection->add('', $feed);
        }

        return $collection;
    }
}
