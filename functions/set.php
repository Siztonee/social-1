
<?php

// Общие функции

  function clear_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
  }





  // Auth

  $inBase = [];



  function namePrimt($res) {
    if($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
        echo 'name: '.$row['name'].'<br>';
        echo '<hr>';
      }
    }
  }



  $namesInBase = namePrimt($resulе);
  $inBase = [];

  function in_base($res) {
    if($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
        $InBase['inname'] = $row['login_auth'];
      }
    }
  }








  if (isset($_POST['submit_auth'])) {
    $login_auth = clear_data($_POST['login_auth']);
    $pass_auth = clear_data($_POST['pass_auth']);

    // MySQL
    $mysql = new mysqli('localhost', 'root', 'root', 'fisrtdata');
    $mysql->query("SET NAMES 'utf8'");
    if($mysql->connect_error) {
      echo 'Error: '.$mysql->connect_error;
      exit;
    }


    // Запросы


    $result = $mysql->query("SELECT * FROM `userinfo` WHERE `login` = '$login_auth' AND `pass` = '$pass_auth'");
    $uss = $result->fetch_assoc();
    if(count($uss) == 0) {
      // echo '<small>Не найдено !</small>';
      $err_m['auth_login'] = '<small id="name_dang" class="dang_mes" style="position: absolute; top: 130px; color: #9c1f28;">Неверный логин или пароль !</small>';
    } else {
      setcookie('verify', $uss['login'], time() + 360 * 2 * 4, "/");
      header('Location: auth.php');
    }

    






  //  $intoSql = "UPDATE `userinfo` SET `avatar` = '$avatarPath' WHERE `userinfo`.`login` = '$intsql'";



    // Validate

    // if(in_array($login_auth, $InBase['inname'])) {
    //   echo 'Найдено !';
    // } else {
    //   echo "Не найдено !";
    // }
  }


// img profiles

function uploadFile(array $file, string $prefix = ''): string {
  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  $fileName = $prefix. '_' .time().".$ext";

  $path_dir = 'img/profiles';


  if(!move_uploaded_file($file['tmp_name'], "$path_dir/$fileName")) {
    die('Ошибка в загрузке изображении !');
  }

  return "img/profiles/$fileName";
}









  // register

  if (isset($_POST['submitTo'])) {
    $namee = clear_data($_POST['name']);
    $loginn = clear_data($_POST['login']);
    $passaa = clear_data($_POST['passa']);
    $passbb = clear_data($_POST['passb']);

    $mysql = new mysqli('localhost', 'root', 'root', 'fisrtdata');
    $mysql->query("SET NAMES 'utf8'");
    if($mysql->connect_error) {
      echo 'Error: '.$mysql->connect_error;
      exit;
    }



    // validate

    $val_name = '/^.*[А-яЁё].*$/';
    $err_m = [];
    $flag = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if(!preg_match($val_name, $namee)) {
        $err_m['name'] = '<small id="name_dang" class="dang_mes" style="position: absolute; top: 130px; color: #9c1f28;">Здесь только русские буквы !</small>';
        $flag = 1;
      }

      if(mb_strlen($namee) > 55 || empty($namee) || mb_strlen($namee) < 3) {
        $err_m['name'] = '<small id="name_dang" class="dang_mes" style="position: absolute; top: 130px; color: #9c1f28;">Длина должна быть не менее 3 и не больше 55 символов !</small>';
        $flag = 1;
      }

      if(empty($loginn) || mb_strlen($loginn) > 15 || mb_strlen($loginn) < 5) {
        $err_m['login'] = '<small id="name_dang" class="dang_mes" style="position: absolute; top: 185px; color: #9c1f28;">Длина должна быть не менее 5 и не больше 15 символов !</small>';
        $flag = 1;
      }

      if (preg_match($val_name, $passaa)) {
        $err_m['pass'] = '<small id="name_dang" class="dang_mes" style="position: absolute; top: 240px; color: #9c1f28;">Пароль не должен состоять из русских букв !</small>';
        $flag = 1;
      }

      if(empty($passaa) || mb_strlen($passaa) > 50 || mb_strlen($passaa) < 5) {
        $err_m['pass'] = '<small id="name_dang" class="dang_mes" style="position: absolute; top: 240px; color: #9c1f28;">Длина должна быть не менее 5 и не больше 50 символов !</small>';
        $flag = 1;
      }

      if($passaa != $passbb) {
        $err_m['passb'] = '<small id="name_dang" class="dang_mes" style="position: absolute; top: 295px; color: #9c1f28;">Пароли не совпадают !</small>';
        $flag = 1;
      }
      if($flag == 0) {
        $query = "INSERT INTO `userinfo` (`name`, `login`, `pass`) VALUES ('$namee', '$loginn', '$passaa')";
        $mysql->query($query);
        print('Успешно сохранено !');
        header('Location: auth.php');
      }
    }
  }




 ?>
