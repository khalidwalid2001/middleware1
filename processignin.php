<?php
$username="root";
$password="";
$database=new pdo("mysql:host=localhost;dbname=middleware;",$username,$password);
if(isset($_POST['signinstudent']))
{
    $emaildatabase=$_POST['email'];
    $verification=$database->prepare("SELECT email FROM student WHERE email = :email");
    $verification->bindParam("email",$emaildatabase);
    $verification->execute();
    //echo $verification->rowCount();
    if ($verification->rowCount()==0)
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $phone=$_POST['phone'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $username=$_POST['username'];
        $college=$_POST['college'];
        $gender=$_POST['gender'];
        $gpa=$_POST['gpa'];
        $topc=$_POST['topc'];
        $description=$_POST['description'];
        $hours=$_POST['hours'];
        $reason=$_POST['reason'];
       
        $fileDatars=file_get_contents($_FILES['rs']["tmp_name"]);
            $fileDatafv=file_get_contents($_FILES['fv']["tmp_name"]);
        $reject="reject";
        $no="no";
        $INSERT=$database->prepare("INSERT INTO student(email,password,phone,fname,lname,username,college,gender,gpa,topc,rs,fv,description,hours,reason) VALUE (
        :email,:password,:phone,:fname,:lname,:username,:college,:gender,:gpa,:topc,:rs,:fv,:description,:hours,:reason)");
        
        $INSERT->bindParam("email",$email);
        $INSERT->bindParam("password",$password);
        $INSERT->bindParam("phone",$phone);
        $INSERT->bindParam("fname",$fname);
        $INSERT->bindParam("lname",$lname);
        $INSERT->bindParam("username",$username);
        $INSERT->bindParam("college",$college);
        $INSERT->bindParam("gender",$gender);
        $INSERT->bindParam("gpa",$gpa);
        $INSERT->bindParam("topc",$topc);
        $INSERT->bindParam("rs",$fileDatars);
        $INSERT->bindParam("fv", $fileDatafv);
        $INSERT->bindParam("description",$description);
        $INSERT->bindParam("hours",$hours);
        $INSERT->bindParam("reason",$reason);
        $INSERT->execute();
        $update=$database->prepare("UPDATE `student` SET `condition`='reject', `report`='no' WHERE `email`=:email ");
        $update->bindParam("email",$email);
        $update->execute();
        if($update->execute())
        {
            
            require_once 'C:\xampp\htdocs\oth\mail.php';
            $mail->setfrom('khalidkoke99@gmail.com','MIDDLEWARE');
$mail->addAddress($email);
$mail->Subject='authnticotion';
$mail->Body='<h1> شكرا لتسجيلك في موقعنا</h1>'
          . "<div> رابط تحقق من حساب" . "<div>" . 
          "<a href='http://localhost/middleware/makecheck.php?code=".md5($password)  . "'>
           " . "http://localhost/middleware/makecheck.php?code=" .md5($password) . "</a>";
$mail->send();
        }
        if($mail->send())
        {
            $code=md5($password);
             $t=$database->prepare("UPDATE `student` SET `securitycode`='$code' WHERE `email`= '$email'");
            $t->execute();
            if($t->execute())
            header("location:login.php");
        }
        
        
    }
}
if(isset($_POST['signindoner']))
{
    $emaildatabase=$_POST['email'];
    $verification=$database->prepare("SELECT email FROM doner WHERE email = :email");
    $verification->bindParam("email",$emaildatabase);

    $verification->execute();
    if($verification->rowCount()==0)
    {
        $INSERT=$database->prepare("INSERT INTO doner(name,email,password,phone)
        VALUE(:name,:email,:password,:phone)");
        
        $email=$_POST['email'];
        $name=$_POST['name'];
        $password=$_POST['password'];
        $phone=$_POST['phone'];
        
        $INSERT->bindParam("name",$name);
        $INSERT->bindParam("email",$email);
        
        $INSERT->bindParam("password",$password);
        $INSERT->bindParam("phone",$phone);
    $INSERT->execute();
    
}}
header("location:login.php");
?>