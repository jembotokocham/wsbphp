<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Użytkownicy</title>

  </head>
  <body>

<h4>Użytkownicy</h4>
<table border rules =all CELLSPACING=0 cellpadding=10>
  <tr ALIGN=center>
    <th>Imie</th>
    <th>Nazwisko</th>
    <th>Data urodzenia</th>
    <th>Miasto</th>
    <th>Województwo</th>
  </tr>
<?php
  require "./scripts/connect.php";
  //$sql = "SELECT * FROM `user`;";
  $sql = "SELECT * FROM `user`INNER JOIN `city` ON `user`.`city_id`=`city`.`id` INNER JOIN `states`ON `city`.`state_id`=`states`.`id`";
  $result = $conn->query($sql);

  while($user=$result->fetch_assoc()){
    echo <<< USER
      <tr ALIGN=center>
      <td>$user[firstName]</td>
      <td>$user[lastName]</td>
      <td>$user[birthday]</td>
      <td>$user[cityName]</td>
      <td>$user[stateName]</td>

      </tr>

    USER;

  }


 ?>

  </body>
</html>
