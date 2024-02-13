<?php

  function printRes($res) {
    if($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
        echo 'id: '.$row['id'].'<br>';
        echo 'name: '.$row['name'].'<br>';
        echo 'login: '.$row['login'].'<br>';
        echo 'password: '.$row['pass'].'<br>';
        echo '<hr>';
      }
    }
  }




  echo "Heуууy";
  $host = 'localhost';
  $user = 'root';
  $pass = 'root';
  $db_name = 'fisrtdata';

  // $mysql = new mysqli($host, $user, $pass, $db_name);
  // $mysql->query("SET NAMES 'utf8'");

  $mysql = new mysqli('localhost', 'root', 'root', 'fisrtdata');
  $mysql->query("SET NAMES 'utf8'");

  echo '<br>';

  if($mysql->connect_error) {
    echo 'Error: '.$mysql->connect_error;
   } else {
    echo 'MySQL connected!'.'<br>';
    echo 'Host info: '.$mysql->host_info;
  }


  echo '<br>'.'<hr>';


  // $mysql->query("INSERT INTO `userinfo` (`name`, `login`, `pass`, `date`) VALUES('Turdukulov Nurislam', 'Siztone', 'pass456', '2002.10.22')");

  // $result = $mysql->query("SELECT * FROM `userinfo`");
  //
  // $dataArray = array();
  //
  // if ($result->num_rows > 0) {
  //     while ($row = $result->fetch_assoc()) {
  //         $dataArray[] = $row; // Добавление строки в массив
  //         print_r($dataArray.'<br>');
  //     }
  // } else {
  //     echo "0 результатов";
  // }


  $result = $mysql->query("SELECT * FROM `userinfo`");
  print_r($result);


  echo '<br>'.'<hr>';

  // printRes($result);

  // $ress = $mysql->query("SELECT `date` FROM `userinfo`");
  // printRes($ress);
  //
  // $row = $res->fetch_assoc();
  // $name = $row['pass'];
  // echo $name.'<br>';
  //
  // $test = $mysql->query("SELECT * FROM `userinfo` ORDER BY `userinfo`.`login`");
  //
  // $echh = $test->fetch_assoc();
  // $ech = $echh['id'];
  // echo $ech;
  //
  // echo '<br>';
  //
  // $stst = $mysql->query("SELECT `pass` FROM `userinfo` WHERE 1");
  //
  // $sdsd = $stst->fetch_assoc();
  // $svsv = $sdsd['pass'];
  // echo $sdsd;


  $mysql->close();
?>

<a href="test.php">Go to -> test.php</a><br>
<a href="auth.php">Go to -> auth.php</a><br>
