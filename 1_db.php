<?php
  $conn = new mysqli("localhost", "root", "", "baza");
  // echo "<hr>".$conn->connect_errno;

  $sql = "SELECT * FROM `user`";
  $result = $conn->query($sql);
  //$user = $result->fetch_assoc();
  //echo $user["firstName"];
  $count = 0;
  while ($user = $result->fetch_assoc()) {
    // echo $user["firstName"];
    $count++;
    echo <<< USER
      Użytkownik $count:<br>
      Imię i nazwisko: $user[firstName] $user[lastName]<br>
      Data urodzenia: $user[birthday]
      <hr>
USER;
  }
 ?>
