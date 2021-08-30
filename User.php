<?php
class User
{
  public $login;
  public $name;
  public $password;
  public $email;
  public function __construct($login, $name, $password, $email)
  {
    $this->login = $login;
    $this->name = $name;
    $this->password = $password;
    $this->email = $email;
  }
  public function getLogin()
  {
    return $this->login;
  }
  public function getName()
  {
    return $this->name;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setLogin($ligin)
  {
    $this->login = $login;
    return $this->login;
  }
  public function setName($name)
  {
    $this->name = $name;
    return $this->name;
  }
  public function setPassword($password)
  {
    $this->password = $password;
    return $this->password;
  }
  public function setEmail($email)
  {
    $this->email = $email;
    return $this->email;
  }
}
