<?php
class Xml
{
  public function addUser($login, $email, $name, $password)
  {
    $xml = simplexml_load_file('users.xml');
    $last = $xml->addChild("user");
    $last->addChild("name", $name);
    $last->addChild("login", $login);
    $last->addChild("email", $email);
    $last->addChild("password", $password);
    $this->saveUser($xml);
  }
  public function saveUser($xml)
  {
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->saveXML();
    $dom->save("users.xml");
    return $xml;
  }

  public function printUsers()
  {
    $xml = simplexml_load_file('users.xml');
    foreach ($xml as $user) {
      echo $user->name;
      echo $user->login;
      echo $user->email;
      echo $user->password;
    }
  }

  public function authorization($login, $password)
  {
    $xml = simplexml_load_file('users.xml');
    foreach ($xml as $user) {
      //echo $login."  ".$password."  ".$user->login."  ".$user->password."</br>";
      if (strcmp($login, $user->login) == 0) {

        if (password_verify($password, $user->password)) {
          return 1; //все верно
        } else {
          return 0; //неверный пароль
        }
      }
    }
    echo "-1";
    return -1; //нет пользователя
  }

  public function uniqueLogin($login)
  {
    $xml = simplexml_load_file('users.xml');
    foreach ($xml as $user) {
      if (strcmp($login, $user->login) == 0) {
        return 0;
      }
    }
    return 1; //нет пользователя
  }

  public function uniqueEmail($email)
  {
    $xml = simplexml_load_file('users.xml');
    foreach ($xml as $user) {
      if (strcmp($email, $user->email) == 0) {
        return 0;
      }
    }
    return 1; //нет пользователя
  }
}
