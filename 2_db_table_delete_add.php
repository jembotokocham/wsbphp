<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Użytkownicy</title>

  </head>
  <body>
<?php
  if (isset($_GET["deleteUser"])){
    if($_GET["deleteUser"] == 0){
      echo "<h4>Nie udało się usunąć użytkownika</h4>";
  }else{
    echo"<h4>Udało się usunąć użytkownika o id=$_GET[deleteUser]</h4>";
  }
}

if (isset($_SESSION["success"])){
  echo "<h4>$_SESSION[success]</h4>";
  unset($_SESSION["success"]);
}

if (isset($_SESSION["error"])){
  echo "<h4>$_SESSION[error]</h4>";
  unset($_SESSION["error"]);
}


 ?>
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
  $sql = "SELECT user.id, user.firstName, user.lastName, user.birthday, city.cityName, states.stateName FROM `user`INNER JOIN `city` ON `user`.`city_id`=`city`.`id` INNER JOIN `states`ON `city`.`state_id`=`states`.`id`";
  $result = $conn->query($sql);
  if ($result->num_rows == 0){
    echo "<tr ALIGN=center><td colspan='5'>Brak rekordów do wyświetlenia</td></tr>";
  }else{

  while($user=$result->fetch_assoc()){

    echo <<< USER
    <tr ALIGN=center>

      <td>$user[firstName]</td>
      <td>$user[lastName]</td>
      <td>$user[birthday]</td>
      <td>$user[cityName]</td>
      <td>$user[stateName]</td>
      <td><a href="./scripts/deleteUser.php?userId=$user[id]">Usuń</a></td>

      </tr>

    USER;
    }
  }
echo"</table><hr>";

 if (isset($_GET["addUserForm"])){
   echo<<<ADDUSERFORM
    <h3>Dodawanie Użytkownika</h3>
    <form action="./scripts/add_user.php" method="post">
      <input type="text" name="firstName" placeholder="Podaj imię"><br><br>
      <input type="text" name="lastName" placeholder="Podaj nazwisko"><br><br>
      <input type="date" name="birthday" > Data urodzenia <br><br>
      <select name="city_id">
    ADDUSERFORM;
    $sql = "SELECT * FROM `city`";
    $result = $conn->query($sql);
    while ($city = $result->fetch_assoc()){
      echo"<option value='$city[id]'>$city[cityName]</option>";
    
    }
    echo<<<ADDUSERFORM
      </select><br><br>
      <input type="checkbox" name="terms"> Regulamin<br><br>
      <input type="submit" value="Dodaj użytkownika">

    </form>

ADDUSERFORM;
 }else{
   echo "<a href=\"./2_db_table_delete_add.php?addUserForm=1\">Dodaj Użytkownika</a>";
 }

?>


  </body>
</html>
