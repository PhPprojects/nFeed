<?php
class Feed_Hurriyet extends Feed_Abstract
{
    protected $_channel = 'hurriyet';

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
            $feed = new Feed( (string)  $item->title, 
                    (string) strip_tags($item->description), 
                    (string) $item->link);
            $collection->add('', $feed);
        }

        return $collection;
    }
}
