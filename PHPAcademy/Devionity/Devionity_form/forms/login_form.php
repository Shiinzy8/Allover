<?php

/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 27.09.2016
 * Time: 19:50
 */
class LoginForm {
    
    private $username;
    private $password;

    /**
     * LoginForm constructor.
     * @param array $data
     */
    function __construct(array $data) {
        $this->username = isset($data['username']) ? $data['username']: NULL ;
        $this->password = isset($data['password']) ? $data['password']: NULL ;
    }

    /**
     * @return bool
     */
    public function validate(){
        return !empty($this->username) && !empty($this->password);
    }

    /**
     * @return null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param null $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}