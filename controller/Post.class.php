<?php 

class Post{
	private $_id, $_nameURL, $_url, $_shorturl, $_date;

    function __construct($id, $nameURL, $url, $shorturl, $date)
    {
        $this->_id = $id;
        $this->_nameURL = $nameURL;
        $this->_url = $url;
        $this->_shorturl = $shorturl;
        $this->_date = $date;
    }

    public function setDate($date)
    {
        $this->_date = $date;
    }

    public function getDate()
    {
        return $this->_date;
    }

    public function setShorturl($shorturl)
    {
        $this->_shorturl = $shorturl;
    }

    public function getShorturl()
    {
        return $this->_shorturl;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setNameURL($nameURL)
    {
        $this->_nameURL = $nameURL;
    }

    public function getNameURL()
    {
        return $this->_nameURL;
    }

    public function setUrl($url)
    {
        $this->_url = $url;
    }

    public function getUrl()
    {
        return $this->_url;
    }

}

?>