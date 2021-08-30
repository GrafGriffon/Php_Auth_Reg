<?php
include 'xml.php';
if (isset($_POST['fname']) && isset($_POST['id'])) {
  session_start();
  $login = $_POST['fname'];
  $password = $_POST['id'];
  //$sha = sha1($password);
  $xml = new Xml();
  $result = $xml->authorization($login, $password);
  if ($result == 1) {
    $_SESSION['login'] = $login;
    setcookie("login", $login, time() + 3600);

    //header("Refresh:0");
  }
  $json = json_encode($result);
  header('Content-Type: application/json');
  echo $json;
}
