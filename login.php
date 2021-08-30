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
        <h2>Login</h2>
        <input type="text" name="login" id="login" placeholder="Login" />
        <input type="password" name="password" id="password" placeholder="Password" />
        <div>
          <input class="btn btn-lg btn-primary btn-block" type="button" name="submit" id="submit" value="submit" onClick="getAuth()" />
          <a href="index.php" class="btn btn-lg btn-primary btn-block">Registration</a>
        </div>
      </form>
    </div>
    <div id="msg"></div>
  <?php
  }
  if (isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    echo "Hello " . $username . "";
    echo "<a href='logout.php' class='btn btn-lg btn-primary btn-block'>Logout</a>";
  }
  ?>
</body>

</html>
