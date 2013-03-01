<?php 

class User{
	private $_id;
	private $_email;
	private $_password;


	public function __construct($id, $email, $password){
		$this->_id = $id;
		$this->_email = $email;
		$this->_password = $password;
	}

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getId()
    {
        return $this->_id;
    }

}

?>