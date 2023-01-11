<?php 


$username="root";
$password="";
$database=new pdo("mysql:host=localhost;dbname=middleware;",$username,$password);
$id=$_GET['id'];
$newamount="yes";
$uplde=$database->prepare("UPDATE student SET report= :report WHERE id= $id") ;$uplde->bindParam("report",$newamount);
         $uplde->execute();
header("location:newdoner.php");
?>