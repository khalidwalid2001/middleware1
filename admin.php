<?php
session_start();
if (empty($_SESSION['name_admin'])) {
  header("Location: login.php");
  exit;
}
else
{
    $username="root";
$password="";
$database=new pdo("mysql:host=localhost;dbname=middleware;",$username,$password);
$re="reject";
$T=$database->prepare("SELECT  `condition` FROM `student` WHERE `condition`=\"reject\";");
  $T->execute(); 
    
    
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Case</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="don.css">
    <style>

    textarea {

      resize: none;

    }
        

    </style>
    </head>
<body>
    <nav class="navbar navbar-expand-lg "  style="background-color: #52796f;">
        <div class="container-fluid">
          <span class="icon" style="float: center;">
            <img class="skill" src="logo.png" width="60" alt="skill-img">
            </span>
          <a class="navbar-brand" href="#" style="color: #000; padding: 20px; padding: 20px; font-size:2.5rem;font-family: Montserrat;">Middleware</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse me-auto" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex   mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active"  href="admin.php" style="color: #000; font-size: 1.5rem;font-family: Montserrat;">Student case</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="report.php" style="color: #000; font-size: 1.5rem;font-family: Montserrat;">Report case</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active"  href="donations.php" style="color: #000; font-size: 1.5rem;font-family: Montserrat;">Donate operation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active"  href="recycle.php" style="color: #000; font-size: 1.5rem;font-family: Montserrat;">Recycle</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active"  href="information.php" style="color: #000; font-size: 1.5rem;font-family: Montserrat;">The report</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active"  href="session.php" style="color: #000; font-size: 1.5rem;font-family: Montserrat;">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="row">
        <div class="col-sm-5" id="title">
          <span class="icon" style="float: center;">
            <img class="skill" src="setting.png" width="60" alt="skill-img">
            </span>
             <label> The Admin information</label>
      <div class="row">
        <div class="col-sm-5">
            <label>Name</label><br>
            <p style="color: #000;"><?php echo $_SESSION['name_admin'];?></p>
        </div>
        <div class="col">
          <label>Email </label><br>
          <p><?php echo $_SESSION['email'];?> </p>
        </div>
      </div>
    </div>
    <div class="col" id="title">
      <span class="icon" style="float: center;">
        <img class="skill" src="education.png" width="60" alt="skill-img">
        </span>
      <label>The Total Student Case </label><br>
      <p style="font-size: 2rem;"> <?php echo $T->RowCount();?> </p>
    </div>
  </div>
  <hr/>
</body>
    
</html>
<?php 
$username="root";
$password="";
$database=new pdo("mysql:host=localhost;dbname=middleware;",$username,$password);
$re="reject";
$SELECT=$database->prepare("SELECT  * FROM student");
$re="reject";
//$SELECT->bindParam("condition",$re,PDO::PARAM_STR,100);
echo '<h1 style="text-align: center; font-size: 2rem;  font-family: Montserrat;">'. "All Student Case". '</h1>';
$SELECT->execute();
foreach($SELECT  as $data)
{
    if($data['condition']=="reject" and $data['report']=="no"){
        echo  '<div class="wrap">';
            echo '<h2>'."Student Case" .'</h2>';
           echo'<br>';
   
    echo'<div class="container-fluid">';

        echo '<div class="row">';
            echo'<div class="col-sm-3">';
                echo'<label>'."Name :".'</label>'.'<br>';
                echo'<p>'.$data['fname']." ".$data['lname'].'</p>';
            echo'</div>';
            echo'<div class="col-sm-3">';
                echo '<label>'."Username :".'</label>'.'<br>';
                 echo'<p>'. $data['username'] .'</p>';
            echo '</div>';
            echo '<div class="col-sm-3">';
                echo'<label>'."Email :".'</label>'.'<br>';
              echo'<p>'. $data['email'] .'</p>';
             echo '</div>';
            echo '<div class="col-sm-3">';
                echo '<label>'."Phone :" .'</label>'.'<br>';
                echo '<p>'. $data['phone'].'</p>';
            echo '</div>';
           
        echo '</div>';
           

        echo'<div class="row">';
            echo'<div class="col-sm-3">';
                echo '<label>'."Gender :".'</label>'.'<br>';
               echo'<p>'. $data['gender'] .'</p>';
            echo '</div>';

            echo '<div class="col-sm-3">';
                echo '<label>'."College :".'</label>'.'<br>';
                echo '<p>'. $data['college'].'</p>';
            echo '</div>';
            echo '<div class="col-sm-3">';
                echo '<label>'."gpa :".'</label>'.'<br>';
                echo '<p>'. $data['gpa']. '</p>';
            echo '</div>';
            echo '<div class="col-sm-3">';
                echo'<label>' ."Total of pass credits :".'</label>'.'<br>';
             echo'<p>'. $data['topc'] .'</p>';
            echo'</div>';
           
           
            echo'<div class="row">';
            echo'<div class="col-sm-3">';
                echo'<label>'."Hours :".'</label>'.'<br>';
               echo'<p>'. $data['hours'] .'</p>';
            echo'</div>';echo'</div>';echo'</div>';
            
        echo'<hr/>';

    echo    '<div class="row">';
        echo    '<div class="col-sm-3 col-md-6 col-lg-4">';
         echo       '<label>'."Description of the case".'</label>'.'<br>';
            echo   '<p>'. $data['description'].'</p>';
            echo '</div>';
        echo '</div>';
        echo '<br>';
        echo '<hr/>';
        echo '<br>';
        echo '<div class="row">';
            echo '<div class="col">';
                echo'<div class="p-3">';
                echo '<label>'."Registration screen".'</label>'.'<br>';
        $img = $data['rs'];
        echo '<img class="skill" src="data:image/jpeg;base64,'.base64_encode($img).'" height=400px width=400px/>';

                
            echo '</div>';
            echo'</div>';
            echo'<div class="col">';
                echo '<div class="p-3">';
               echo '<label>'."Financial voucher".'</label>'.'<br>';
        $img = $data['fv'];
        echo '<img class="skill" src="data:image/jpeg;base64,'.base64_encode($img).'"height=400px width=400px/>';

               
            echo'</div>';
        echo'</div>';echo'</div>';
            
        
        echo '<hr/>';
    

        echo '<form method="POST" action="">';
        echo '<div class="row">';
           echo  '<div class="col-lg-6">';
                echo '<div class="p-6">';
                echo '<label>'. "Amount".'</label>'.'<br>';
               echo '<input name="amount" type="number" required="required">';
            echo '</div>';
            echo '</div>';

            echo '<div class="col-lg-6">';
               echo '<div class="p-6">';
                echo '<label>'. "Efawateer".'</label>'.'<br>';
                echo '<input type="number" name="efawateer" required="required">';
                echo '</div>';
            echo '</div>';
                echo '<div class="col-lg-12">';
                    echo '<div class="p-12">';
                        echo '<label >'.'</label>'.'<br>';
                        echo '<br>';
                          echo ' <button type="submit"  name="accept"  value =" '.$data['id'].'" class="btn" style="background-color: #2f3e46;color: #cad2c5; font-family: Montserrat;font-size: 1.5rem">'."Accept"."</button>";

               /*echo '<button name="accept" value =" '.$data['id'].'" type="submit" class="btn" style="background-color: #A8E890;font-size: large;">'."accept".'</button>';*/
           echo '</div>';
           echo '</div>';

           echo '</div>';
        echo '</form>';
        
        
           echo '<form method="POST" action="">';
            echo'<div class="row">';
                echo '<div class="col-sm-12">';
                    echo '<div class="p-12">';
                   echo '<label>'. "Reason to reject".'</label>'.'<br>';
                    echo '<textarea type="text" name="reason" placeholder="reason to reject" rows="4" cols="50" maxlength="50" required="required">'.'</textarea>';
                    echo '<br>';
        echo '<br>';
                  /*  echo'<button name="delete" value =" '.$data['id'].'" type="submit" class="btn" style="background-color: #A8E890;font-size: large;">',"delete".'</button>';*/
                            echo '<button type="submit" name="delete" class="btn" value =" '.$data['id'].'" style="background-color: #2f3e46;color: #cad2c5; font-family: Montserrat;font-size: 1.5rem">'."Delete".'</button>';

                    
              echo  '</div>';
          echo  '</div>';  
        echo '</div>';
        echo '</form>';
		echo '</div>';
		echo '</div>';
        
        
    /*   
    echo "email: ".$data['email'].'<br>';
    echo "name: ".$data['fname']." ".$data['lname'].'<br>';
    echo "username: ".$data['username'].'<br>';
    echo "college: ".$data['college'].'<br>';
    echo "gender: ".$data['gender'].'<br>';
    echo "gpa: ".$data['gpa'].'<br>';
    echo "topc: ".$data['topc'].'<br>';
    echo "description: ".$data['description'].'<br>';
        echo "condition: ".$data['condition'].'<br>';

        echo "hours: ".$data['hours'].'<br>';

       // echo "efawateer: ".$data['efawateer'].'<br>';

        echo "topc: ".$data['topc'].'<br>';
        echo "report: ".$data['report'].'<br>';
            $img = $data['rs'];
echo '<img src="data:image/jpeg;base64,'.base64_encode($img).'" height=400px width=600px/>';
        echo "                                                 ";
            $img = $data['fv'];
echo '<img src="data:image/jpeg;base64,'.base64_encode($img).'"height=400px width=600px/>';*/
       /* echo '<form method="POST" action="">';
        echo '<input type="number" name="amount" placeholder="amount" width="20px">';
        echo "       ";
        echo '<input type="number" name="efawateer" placeholder="efawateer" width="20px">';
        
         echo '<button name="accept" value =" '.$data['id'].'" type="submit">'."accept".'</button>';
        echo '</form>';
        
        echo '<form method="POST" action="">';
        echo '<input type="text" name="reason" placeholder="reason to reject">';
        echo '<button name="delete" value =" '.$data['id'].'" type="submit">'."delete".'</button>';
        echo '</form>';
        echo '</div>';*/
            
    }
}
if(isset($_POST['accept']))
{
    $id= $_POST['accept'];
   $amount=$_POST['amount'];
    $efawateer=$_POST['efawateer'];
 $update=$database->prepare("UPDATE `student` SET `amount`='$amount', `efawateer`='$efawateer',`condition`='accept' WHERE `id`= $id") ;
    $update->execute();
    
}
if(isset($_POST['delete']))
{
    $id=$_POST['delete'];
    
    $SLECT=$database->prepare("SELECT `username`,`email`,`fname` FROM `student` WHERE `id`= $id");
    $SLECT->execute();
   if($SLECT->rowCount()==1)
   {
       foreach($SLECT as $data)
       {
           $INSERT=$database->prepare("INSERT INTO recycle(
username,email,name,reason) VALUE(:username,:email,:name,:reson)");
           $email=$data['email'];
           $username=$data['username'];
           $name=$data['fname'];
           $reason=$_POST['reason'];
           $INSERT->bindparam("username",$username);
           $INSERT->bindparam("email",$email);
           $INSERT->bindparam("name",$name);
           $INSERT->bindparam("reson",$reason);
           
           $INSERT->execute();
       }
   }
  // write delete statment 
     $delet=$database->prepare("DELETE FROM student WHERE id = $id ");
    $delet->execute();
}
?>
