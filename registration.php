<?php
include 'User.php';
include 'xml.php';
if (isset($_POST['flogin']) && isset($_POST['fpassword']) && isset($_POST['femail']) && isset($_POST['fname']) && isset($_POST['fconfirm_password'])) {
  $user = new User($_POST['flogin'], $_POST['fname'], password_hash($_POST['fpassword'], PASSWORD_DEFAULT), $_POST['femail']);
  $json = json_encode(getResult($user, $_POST['fpassword'], $_POST['fconfirm_password']));
  header('Content-Type: application/json');
  echo $json;
}

function getResult($user, $password, $password2)
{
  return checkPassword($user, $password, $password2);
}

function checkPassword($user, $password, $password2)
{
  if ((preg_match('/[0-9]/', $password)) && (preg_match('/[A-Z]/', $password)) && (preg_match('/[a-z]/', $password)) && (preg_match('/[\!\@\$\_]/', $password)) && (strlen($password) >= 6)){
  if (strcmp($password, $password2)) {
    return 2;
  }
  return checkLogin($user);
}
  return 4;
}

function checkLogin($user)
{
  if ((preg_match('/[0-9A-Za-z]/', $user->getLogin())) && (strlen($user->getLogin()) >= 6)) {
    return checkName($user);
  }
  return 6;
}

function checkName($user)
{
  if ((preg_match('/[0-9A-Za-z]/', $user->getName())) && (strlen($user->getName()) == 2)) {
    return checkEmail($user);
  }
  return 5;
}

function checkEmail($user)
{
  if (filter_var($_POST['femail'], FILTER_VALIDATE_EMAIL)) {
    return checkUnique($user);
  }
  return 7;
}

function checkUnique($user)
{
  $xml = new Xml();
  $uniqueL = $xml->uniqueLogin($user->getLogin());
  $uniqueE = $xml->uniqueEmail($user->getEmail());
  if ($uniqueL == 1 && $uniqueE == 1) {
    $xml->addUser($user->getLogin(), $user->getEmail(), $user->getName(), $user->getPassword());
    return 1;
  } else {
    return 3;
  }
}
?>
