<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="ajax.js"></script>
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION['login'])) {
  ?>
    <div class="stn" id="stn">
      <form class="form-signin" method="post" id="ajax_form_auth" action="">
        <h2>Registration</h2>
        <input type="text" name="login" id="login" placeholder="Login" />
        <div id="erlogin" style="display: none" class="alert alert-danger">
          Проверьте верность введенного логина
        </div>
        <div />
    </div />
    <input type="password" name="password" id="password" placeholder="Password" />
    <div id="erpassword" style="display: none" class="alert alert-danger">
      Проверьте верность введенного пароля
    </div>
    <div />
    <input type="email" name="email" id="email" placeholder="Email" />
    <div id="eremail" style="display: none" class="alert alert-danger">
      Проверьте верность введенного email
    </div>
    <div />
    <input type="text" name="name" id="name" placeholder="Name" />
    <div id="ername" style="display: none" class="alert alert-danger">
      Проверьте верность введенного имени
    </div>
    <div />
    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" />
    <div id="erconfirm_password" style="display: none" class="alert alert-danger">
      Различные пароли
    </div>
    <div />
    <div id="erunique" style="display: none" class="alert alert-danger">
      Проверьте данные на уникальность
    </div>
    <div>
      <input class="btn btn-lg btn-primary btn-block" type="button" name="submit" id="submit" value="submit" onClick="getReg()" />
      <a href="login.php" class="btn btn-lg btn-primary btn-block">Autoresation</a>
    </div>
    </form>
    </div>
    <div id="msg"></div>
  <?php
  }
  ?>
</body>
</html>
