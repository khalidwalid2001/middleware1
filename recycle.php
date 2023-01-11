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
$T=$database->prepare("SELECT  * FROM recycle ");
  $T->execute();
}
?>
<html>
<head><meta charset="utf-8">
    <title>Recycle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="don.css">
    <style>
    .collapse{
  display: flex;
  align-items: center;
  justify-content: end;
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
                <a class="nav-link active"  href="#" style="color: #000; font-size: 1.5rem;font-family: Montserrat;">The report</a>
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
          <p> <?php echo $_SESSION['email'];?></p>
        </div>
      </div>
    </div>
    <div class="col" id="title">
      <span class="icon" style="float: center;">
        <img class="skill" src="education.png" width="60" alt="skill-img">
        </span>
      <label>The Total cases </label><br>
      <p style="font-size: 2rem;"> <?php echo $T->RowCount(); ?></p>
    </div>
  </div>

  <hr/>
       <h1 style="text-align: center; font-size: 3rem;  font-family: Montserrat;">Recycle Table</h1>
    <br>
    <br>
    <table>
      <tr style="background-color:#A8E890;">
        <th style="text-align: center; font-size: 2rem;background-color:#52796f;">  name </th>
        <th style="text-align: center; font-size: 2rem;background-color:#52796f;">   username </th>
        <th style="text-align: center; font-size: 2rem;background-color:#52796f;">  Email </th>
        <th style="text-align: center; font-size: 2rem;background-color:#52796f;">  Report </th>
      </tr>
    <?php
$username="root";
$password="";
$database=new pdo("mysql:host=localhost;dbname=middleware;",$username,$password);
$select=$database->prepare("SELECT * FROM `recycle`");
$select->execute();
            foreach($select as $data)
            {
echo '<tr>';
    echo '<td>'.$data['name'].'</td>';
    echo '<td>'.$data['username'].'</td>';
                echo '<td>'.$data['email'].'</td>';
                echo '<td>'.$data['reason'].'</td>';
  echo '</tr>';

            }
?> 
        </table>
      
        </body>
    </html>