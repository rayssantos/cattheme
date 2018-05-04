<?php
global $wpdb;
$dbh = $wpdb->dbh;

$result = $dbh->query("select name, email from user");

if (!empty($_POST['user'])) {
  $user = $_POST['user'];
  $sql = "insert into user (name, email) values ('" . $user[name] . "', '" . $user[email] . "')";
  mysqli_query($dbh, $sql);
  header('location: /');
}?>

<!DOCTYPE html>
<html>
<title>Cat Theme</title>
<!--<body bgcolor="1E90FF" background="https://img00.deviantart.net/c761/i/2013/066/8/c/catbug_by_water_wing-d5xbhl5.jpg">-->
<h1><b>Cat Bug</b></h1>

<br>
<form method="post" action="/">
<label> Nome </label>
<input type="text" name="user[name]"/>

<label> Email </label>
<input type="text" name="user[email]"/>
<button type="submit"> Addicionar </button> 
</form>
<table>
  <thead>
     <td>Código</td>
     <td>Nome</td>
  </thead>
  <tbody>


<?php
while($row = $result->fetch_row()){
  echo "<tr>";
  echo "<td>" . $row[0] . "</td>";
  echo "<td>" . $row[1] . "</td>";
  echo "</tr>";
}?>

</tbody>


</body>
</html>

