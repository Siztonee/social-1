<?php //include_once 'functions/set.php';
require 'functions/set.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php
      if($_COOKIE['verify'] == ''):
     ?>
    <div class="form_cl">
      <form class="formm" method="post">
        <h1 style="top: 10px;">Вход</h1>
        <input type="text" name="login_auth" id="login" placeholder="Логин" value="<?php echo $_POST['login'] ?>"><br>
        <?php echo $err_m['auth_login'] ?>
        <input type="password" name="pass_auth" id="passa" placeholder="Пароль" ><br>
        <?php echo $err_m['pass'] ?>
        <input type="submit" name="submit_auth" id="subb" value="Готово" style="top: 35px;">

      </form>
    </div>


    <style media="screen">
     .form_cl input {
        position: relative;
        top: 15px;
        margin-top: 20px;
      }
    </style>
    <?php else: ?>
      <?php
      $mysql = new mysqli('localhost', 'root', 'root', 'fisrtdata');
      $mysql->query("SET NAMES 'utf8'");
      if($mysql->connect_error) {
        echo 'Error: '.$mysql->connect_error;
        exit;
      }

      $exSqll = $_COOKIE['verify'];
      $sqlProfile = $mysql->query("SELECT * FROM `userinfo` WHERE `login` = '$exSqll'");
      while($us = mysqli_fetch_assoc($sqlProfile)) {
        $profilePhoto = $us['avatar'];
      }
       ?>

      <h1>Привет, <?=$_COOKIE['verify']?>. Чтобы выйти нажмите на <a href="exit.php">ВЫЙТИ.</a></h1>
      <?php  require 'profiles.php'; ?>
      <h2>Ваш профиль: </h2>

      <div class="profile" style="display: grid;
       justify-content: center;
       align-items: center;
       text-align: center;">
        <img src="<?=$profilePhoto?>" style="width: 200px;
         height:200px;
         border-radius: 50%;
         border: 1px solid silver;
         ">
        <h1><?=$_COOKIE['verify']?></h1>
        <hr>
        <h3></h3>
      </div>

      <div class="settingsOfProfile">
        <form class="formOfSettings" action="auth.php" method="post" enctype="multipart/form-data">
          <h2>Изменить аватарку</h2>
          <input type="file" name="upld_file"><br><br>
          <?php echo $err_m['warn_type'] ?>
          <input type="submit" name="sub_file" value="Изменить">
        </form>
      </div>
    <?php endif; ?>
    <?php  ?>
    <?php
      $mysql->close();
     ?>
  </body>
</html>
