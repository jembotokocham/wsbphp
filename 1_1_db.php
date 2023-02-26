<?php
  require "./scripts/connect.php";
  $sql = "SELECT * FROM `user` JOIN `city` ON `user`.`city_id`=`city`.`id`";
  $result = $conn->query($sql);
  $count = 0;
  while ($user = $result->fetch_assoc()) {
    $count++;
    echo <<< USER
      Użytkownik $count:<br>
      Imię i nazwisko: $user[firstName] $user[lastName]<br>
      Data urodzenia: $user[birthday]<br>
      Miasto: $user[cityName]
      <hr>
USER;
  }
 ?>
