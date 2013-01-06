<?php
class Feed
{
    /**
     * @var string
     */
    private $_title;

    /**
     * @var string
     */
    private $_description;

    /**
     * @var string
     */
    private $_link;

    /**
     * @param string $title
     * @param string $description
     * @param string $link
     */
    public function __construct($title, $description, $link)
    {
        $this->_title = $title;
        $this->_description = $description;
        $this->_link = $link;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->_title;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->_description;
    }

    /**
     * @return string
     */
    public function link()
    {
        return $this->_link;
    }
}
