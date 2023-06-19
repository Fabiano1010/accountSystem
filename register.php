<?php
session_start();
// try{
$con = mysqli_connect("localhost", "root", "", "users") or die("Connection error");
mysqli_set_charset($con, "utf8");

$name = $_POST['firstname'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$login= $_POST['login1'];
$pass= $_POST['pass1'];
$pass = md5($pass);


$sql = "INSERT INTO users(firstname, surname, email, user, pass) VALUES ('".$name."','".$surname."','".$email."','".$login."','".$pass."');";
$sql2 = "CREATE TABLE ".$login."_db"."(id INT PRIMARY KEY AUTO_INCREMENT NOT NUll)";
$query = mysqli_query($con, $sql)or die("Query error");
$query2 = mysqli_query($con, $sql2)or die("Query error");

header("Location: index.php?success");
mysqli_close($con);

// }
// catch(Exception $ex){
//     header("Location: index.php?failure");
// }
?>
