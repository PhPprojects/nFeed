<?php
abstract class Feed_Abstract
{
    /**
     * @var Zend_Config
     */
    protected $_config;

    /**
     * @var string
     */
    protected $_channel;

    public function __construct(Zend_Config $config)
    {
        $this->_config = $config;
    }

    /**a
     * returns feeds
     * @param string $data
     * @return ArrayList
     */
    abstract protected function _getFeeds($data);

    /**
     * returns type list
     * @return ArrayList
     */
    abstract protected function _getTypes();

    /**
     * fetches data from remote server.
     * @param string $typeUrl
     * @return mixed
     */
    protected function _fetchData($url)
    {
        $ch      = curl_init();
        $options = array(CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true);
        curl_setopt_array($ch, $options);
        $result  = curl_exec($ch);
        $error   = curl_error($ch);
        curl_close($ch);
        if($error) {
            throw new Exception('Connection is failed. Error detail:' . $error);
        }
        return $result;
    }

    /**
     * returns feeds
     * @param string $typeUrl
     * @return ArrayList
     */
    public function getFeeds($typeUrl)
    {
        $format     = $this->_config->{ $this->_channel }->config->format;
        $result     = $this->_fetchData($typeUrl);
        $formatter  = Formatter_Factory::create($format);
        $data       = $formatter->format($result);
        return $this->_getFeeds($data);
    }

    /**
     * returns type list
     * @return ArrayList
     */
    public function getTypes() {
        return $this->_getTypes();
    }
}
