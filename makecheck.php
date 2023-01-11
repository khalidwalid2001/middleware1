<?php 
$cod=$_GET['code'];


  $username="root";
$password="";
$database=new pdo("mysql:host=localhost;dbname=middleware;",$username,$password);
$INSERT=$database->prepare("UPDATE `student` SET `authentication`='yes' WHERE `securitycode`= '$cod'");
$INSERT->execute();
if($INSERT->execute())
{
    session_start();
    session_unset();
session_destroy();
    header("location:login.php");
}
?>