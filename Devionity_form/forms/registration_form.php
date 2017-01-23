<?php

/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 20.09.2016
 * Time: 18:56
 */
class RegistrationForm {
    private $email;
    private $username;
    private $password;
    private $passwordConfirm;

    /**
     * RegistrationForm constructor.
     * @param array $data
     */
    function __construct(Array $data) {
        $this->email = isset($data['email'])?$data['email'] : null;
        $this->username = isset($data['username'])?$data['username'] : null;
        $this->password = isset($data['password'])?$data['password'] : null;
        $this->passwordConfirm = isset($data['passwordConfirm'])?$data['passwordConfirm'] : null;
    }
    
    public function  passwordsMatch() {
        return $this->password == $this->passwordConfirm;
    }
    
    public function validate() {
        return !empty($this->email) && !empty($this->username) && !empty($this->password) && !empty($this->passwordConfirm) && $this->passwordsMatch();
    }

    /**
     * @return mixed|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed|null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed|null $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed|null $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed|null
     */
    public function getPasswordConfirm()
    {
        return $this->passwordConfirm;
    }

    /**
     * @param mixed|null $passwordConfirm
     */
    public function setPasswordConfirm($passwordConfirm)
    {
        $this->passwordConfirm = $passwordConfirm;
    }

}

