<?php
  include_once 'functions/set.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>POST запросы</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>




  <div class="form_cl">
    <form class="formm" method="post">
      <h1 style="top: 10px;">Регистрация</h1>
      <input type="text" name="name" id="name" placeholder="Введите свое Ф.И.О." value="<?php echo $_POST['name'] ?>" ><br>
      <?php echo $err_m['name'] ?>
      <input type="text" name="login" id="login" placeholder="Придумайте ваш Логин" value="<?php echo $_POST['login'] ?>"><br>
      <?php echo $err_m['login'] ?>
      <input type="password" name="passa" id="passa" placeholder="Придумайте пароль" ><br>
      <?php echo $err_m['pass'] ?>
      <input type="password" name="passb" id="passb" placeholder="Повторите пароль" ><br>
      <?php echo $err_m['passb'] ?>
      <input type="submit" name="submitTo" id="subb" value="Готово" style="top: 35px;">

    </form>
  </div>


  <style media="screen">
   .form_cl input {
      position: relative;
      top: 15px;
      margin-top: 20px;
    }

  </style>



  <?php
  $mysql->close();
  ?>





  </body>
</html>
