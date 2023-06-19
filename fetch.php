<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "users") or die("Błąd połączenia z bazą danych");
mysqli_set_charset($con, "utf8");

if($_SESSION['user_session']=="Fabiano"){


$sql = "SELECT * FROM ".$_SESSION['database'].";";
$query = mysqli_query($con, $sql)or die("Query error");  
echo "<table class='table'>";
  $co="";    
  $co="
  <thead>
    <tr>
    <th>Country</th>
    <th>Language</th>
    <th>Population</th>
    <th>Continent</th>
    </tr>
    <thead>";
  while($row = mysqli_fetch_row($query)){

    
    $co.="<tr><td>";
    $co.=$row[1];
    $co.="</td><td>";
    $co.=$row[2];
    $co.="</td><td>";
    $co.=$row[3]."mil.";
    $co.="</td><td>";
    $co.=$row[4];
    $co.="</td></tr>";
    echo $co;
    $co="";
  }

}
elseif($_SESSION['user_session']=="user"){

  $sql = "SELECT * FROM ".$_SESSION['database'].";";
  $query = mysqli_query($con, $sql)or die("Query error");  
  $co='';
  echo "<center><h3 class='capitalize'>Cats:<h3><br>";
  echo "<div class='board1'>";
  while($row = mysqli_fetch_array($query)){
    echo "<div class='cats'>";
    echo $co;
    $co.="<h3>Name: ";
    $co.=$row[3];
    $co.="</h3>";
    $co.="<img style='border-radius: 5px; height: 240px;width: 380px;' src='data:image/png;base64,".base64_encode($row['img_data'])."'>";

    echo $co;
    $co="";
    echo"</div>";
    
    //var_dump($row['img_data']);
  }
  echo"</div><br></center>";


}
elseif($_SESSION['user_session']=="user2"){
  $sql = "SELECT * FROM ".$_SESSION['database'].";";
  $query = mysqli_query($con, $sql)or die("Query error");  

  $co="";
  echo "<center><h3 class='capitalize'>Tasks:<h3><br>";
  echo "<div class='board'>";

  while($row = mysqli_fetch_array($query)){
    echo "<div>";
      echo $co;
      $co.="<h4>Date: ";
      $co.=$row[1];
      $co.="</h4>";
      $co.="Desc.: ";
      $co.=$row[2];
      echo $co;
      $co="";
      echo"</div>";
  }
  echo"</div><br></center>";
}
else{
$sql = "SELECT * FROM ".$_SESSION['database'].";";
$query = mysqli_query($con, $sql)or die("Query error");


echo "<table class='table'>";
  $co="";
  while($row = mysqli_fetch_row($query)){
  $co.="<tr><td>";
  $co.=$row[1];
  $co.="</td><td>";
  $co.=$row[2];
  $co.="</td><td>";
  $co.=$row[3];
  $co.="</td><td>";
  $co.=$row[4];
  $co.="</td><td>";
  $co.=$row[5];
  $co.="</td></tr>";
  echo $co;
  $co="";
      
  }
      
  echo "</table>";
}

mysqli_close($con);
?>

