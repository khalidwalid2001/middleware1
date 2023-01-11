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
    $numberofstudent=$database->prepare("SELECT id FROM student");
    $numberofstudent->execute();
    $numberofdoner=$database->prepare("SELECT idd FROM doner");
    $numberofdoner->execute();
    $stmt = $database->prepare('SELECT SUM(amount) FROM donations');
$stmt->execute();
$sum = $stmt->fetchColumn();
    $donations = $database->prepare('SELECT numberofDonation FROM donations');
    $donations->execute();
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Report</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="rap.css">
    
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

      <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3" style="background-color: #52796f;" align="center">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading1" style="color: #000;margin-right: 30px;">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading2" style="color: #000;margin-right: 30px;">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading3" style="color: #000;margin-right: 30px;">Most</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading4" style="color: #000;margin-right: 20px;">College</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading5" style="color: #000;margin-right: 30px;">Resone</a>
          </li>
        </ul>
      </nav>

          <div class="row" id="scrollspyHeading1">
            <div class="col-lg-4" id="titlel" >
              <span class="icon" style="float: center;">
                <img class="skill" src="setting.png" width="60" alt="skill-img">
                </span>
                 <label> The Admin information</label>
          <div class="row">
            <div class="col-sm-5">
                <label>Name</label><br>
                <p style="color: #000;"><?php echo $_SESSION['name_admin'];?></p>
            </div>
            <div class="col-sm-5">
              <label>Email </label><br>
              <p> <?php echo $_SESSION['email'];?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6" id="par">
          <p > All site analyses and percentages on this page are for the admin, so it includes the registered students, registered donors, the number of students from each college, and analyses of the most registered reasons and the reasons that received the most donations, 
            allowing the admin to easily extract all the percentages he requires for the site's quarterly report. </p>
        </div>
      </div>
    
    <br>
    
        <hr/>

           <!--section1-->
           <div class="row" align="center">
            <div class="col" style="padding-left: 40px;padding-bottom: 40px;">
          <span class="icon" style="float: center;">
            <img class="skill" src="pie-chart.png" width="60" alt="skill-img">
          </span>
          <label id="scrollspyHeading2" style="font-family:Montserrat;color: #2f3e46;font-size: 3rem;padding-left: 10px; padding-top: 30px;"> Analytics Dashboard </label>
          </div>
          </div>
          
         

          <div class="row" align="center" style="margin-left: 10px;margin-right: 10px;">

            <div class="col">
            <div class="wrap2">
                   <i class="icon" style="padding-top:10px;">
                    <!--style=" position: relative;bottom: 15px ; overflow: visible ;float: center;margin-bottom:30px; "-->
                    <img class="skill" src="graduating-student.png" width="60" alt="skill-img">
                  </i>
                   <label style="font-size: 2rem;"> Student</label>
                   <div class="row">
                   <label> <?php echo $numberofstudent->RowCount(); ?> </label>
                   </div>
            </div>
            </div>
            
            <div class="col">
            <div class="wrap2">
                    <i class="icon" style="padding-top:10px; ">
                      <img class="skill" src="user (1).png" width="60" alt="skill-img">
                    </i>
                    <label style="font-size: 2rem;">Donar</label>
                    <div class="row">
                    <label> <?php echo $numberofdoner->RowCount(); ?> </label>
                    </div>
            </div>
            </div>
         

            
            <div class="col">
            <div class="wrap2">
                    <i class="icon" style="padding-top:10px;">
                      <img class="skill" src="money (1).png" width="60" alt="skill-img">
                    </i>
                    <label style="font-size: 2rem;"> Amount</label>
                    <div class="row">
                    <label> <?php echo $sum ?> </label>
                    </div>
            </div>
            </div>

            <div class="col">
              <div class="wrap2">
                  <i class="icon" style="padding-top:10px; ">
                    <img class="skill" src="save-money.png" width="60" alt="skill-img">
                  </i>
                  <label style="font-size: 2rem;"> Operation</label>
                  <div class="row">
                  <label> <?php echo $donations->RowCount() ; ?> </label>
                 
            </div>
            </div>
            </div>
          </div>

            

            
        <!--section 2-->
        <div class="row">
          <div class="col" style="padding-left: 40px;padding-bottom: 40px;">
        <span class="icon" style="float: center;">
          <img class="skill" src="analysis.png" width="60" alt="skill-img">
        </span>
        <label id="scrollspyHeading3" style="font-family:Montserrat;color: #2f3e46;font-size: 2rem;padding-left: 10px; padding-top: 30px;"> The most registered categories</label>
        </div>
        </div>
        <?php
        $query = "SELECT college, COUNT(*) as num_students FROM student GROUP BY college ORDER BY num_students DESC";


$stmt = $database->prepare($query);


$stmt->execute();


$most_common_college = $stmt->fetch();

$numberenrol=$database->prepare("SELECT id FROM student WHERE college=:college;");
        $college=$most_common_college['college'];
        $numberenrol->bindparam("college",$college);
       $numberenrol->execute(); 
        $numberofallstudent=$database->prepare("SELECT id FROM student ");
        
$numberofallstudent->execute();
        
        ?>


        <div class="row" style=" justify-content: center;">
          <div class="row">

            <div class="col">
          <div class="container">
            <label>The most enrolled college</label>
            <div class="progress-container">
            <div class="outer">
              <div class="inner">
                <div class="number"> <p style="align-items: center;font-size: 1.5rem; color: #2f3e46;"><?php
                    $percentage = ($numberenrol->RowCount() / $numberofallstudent->RowCount()) * 100 ;
                    $percentage = sprintf("%.2f", $percentage);
                    echo $percentage."%";
                    ?>
                    </p></div>
              </div>
            </div>
          </div>
            <div class="line"></div>
            <div class="progress-report">
              <div class="row">
              <h3 style="margin-right: 20px;">College</h3>
              <span><?php echo $most_common_college['college'];?></span>
              </div>
              <div class="line"></div>
              <div class="row">
              <h3> Enrolled students</h3>
              <span><?php echo $numberenrol->RowCount();?></span>
              </div>
            </div>
          </div>
            </div>
            <?php
             $query = "SELECT college, COUNT(*) as num_donations FROM donations GROUP BY college ORDER BY num_donations DESC";

// Prepare the statement
$dd = $database->prepare($query);

// Execute the statement
$dd->execute();

// Fetch the college with the most donations
$most_donations_college = $dd->fetch();
              
              $donationsforcollege=$database->prepare("SELECT * FROM donations WHERE college=:nameofcollege");
            
              $nameofcollege=$most_donations_college['college'];
              $donationsforcollege->bindParam("nameofcollege",$nameofcollege);
              $donationsforcollege->execute();

$donationsallcollege=$database->prepare("SELECT * FROM donations");
              $donationsallcollege->execute();
              
              ?>
            <div class="col">
          <div class="container">
            <label>The most donated college</label>
            <div class="progress-container">
            <div class="outer">
              <div class="inner">
                <div class="number"> <p style="align-items: center;font-size: 1.5rem; color: #2f3e46;">
                    <?php 
                    $x=(($donationsforcollege->RowCount()/$donationsallcollege->RowCount())*100);
                    $x = sprintf("%.2f", $x);

                    echo $x."%"?>
                    </p></div>
              </div>
            </div>
          </div>
            <div class="line"></div>
            <div class="progress-report">
              <div class="row">
              <h3 style="margin-right: 20px;">college</h3>
              <span> <?php echo $most_donations_college['college']; ?> </span>
              </div>
              <div class="line"></div>
              <div class="row">
              <h3> Enrolled students</h3>
              <span><?php echo $donationsforcollege->RowCount(); ?></span>
              </div>
            </div>
          </div>
            </div>
            <?php 
             
              ?>
            <div class="col">
          <div class="container">
            <label>Most registered reason</label>
            <div class="progress-container">
            <div class="outer">
              <div class="inner">
                  <?php
                  $sql = "SELECT reason, COUNT(*) as count FROM student GROUP BY reason ORDER BY count DESC LIMIT 1";
$stmt = $database->prepare($sql);
$stmt->execute();
$most_common_reason = $stmt->fetch();
                  ?>
                <div class="number"> <p style="align-items: center;font-size: 1.5rem; color: #2f3e46;">
                   <?php 
                    $sql = "SELECT COUNT(*) as total FROM student";
$stmt = $database->prepare($sql);
$stmt->execute();
$total_reasons = $stmt->fetchColumn();
 $percent = ($most_common_reason['count'] / $total_reasons) * 100;
                    $percent = sprintf("%.2f", $percent);

echo $percent."%";
                    ?>
                    </p></div>
              </div>
            </div>
          </div>
            <div class="line"></div>
            <div class="progress-report">
              <div class="row">
              <h3 style="margin-right: 20px;">Resone</h3>
              <span><?php echo $most_common_reason['reason']?></span>
              </div>
              <div class="line"></div>
              <div class="row">
              <h3> Cases number</h3>
              <span><?php echo $most_common_reason['count']?></span>
              </div>
            </div>
          </div>
            </div>
            <div class="col">
          <div class="container">
            <label>Most donated cause</label>
              <?php 
             
$stmt = $database->prepare("SELECT reason, COUNT(*) as count FROM donations GROUP BY reason ORDER BY count DESC LIMIT 1");
$stmt->execute();
$most_common_reason = $stmt->fetch();
              ?>
            <div class="progress-container">
            <div class="outer">
              <div class="inner">
                <div class="number"> <p style="align-items: center;font-size: 1.5rem; color: #2f3e46;">
                    <?php
                    $ss=$database->prepare("SELECT * FROM donations");
                    $ss->execute();
                    $number=(  ($most_common_reason['count']  /$ss->RowCount()  )*100);
                    $formatted_number = sprintf("%.2f", $number);

                    echo $formatted_number."%";
                    
                    ?>
                    </p></div>
              </div>
            </div>
          </div>
            <div class="line"></div>
            <div class="progress-report">
              <div class="row">
              <h3 style="margin-right: 20px;">Resone</h3>
              <span><?php echo $most_common_reason['reason'];?> </span>
              </div>
              <div class="line"></div>
              <div class="row">
              <h3> Cases number</h3>
              <span><?php echo $most_common_reason['count'] ?></span>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
        <br> 
            

          <!--section 2-->
          <div class="row">
            <div class="col" style="padding-left: 40px;padding-bottom: 40px;">
          <span class="icon" style="float: center;">
            <img class="skill" src="college.png" width="60" alt="skill-img">
          </span>
             <label id="scrollspyHeading4"  style="font-family:Montserrat;color: #2f3e46;font-size: 2rem;padding-left: 10px; padding-top: 30px;"> Aalyzes of each college</label>
            </div>
          </div>

             <section class="recent">
              <div class="activity-card">
              <table>
                <thead>
                  <tr>
                    <th> Collage Name  </th>
                    <th>  Student  </th>
                    <th>  Donar </th>
                  </tr>
                </thead>
                
                <tbody>
                  <td> Arts </td>
                  <td>  16 </td>
                  <td> 3 </td>
                <tr>
                  <td> Business </td>
                  <td>  20 </td>
                  <td> 6 </td>
                </tr>
                <tr>
                  <td> Sharia </td>
                  <td>  40 </td>
                  <td> 30 </td>
                </tr>
                <tr>
                  <td> Educational Sciences </td>
                  <td>  35 </td>
                  <td> 15 </td>
                </tr>
                <tr>
                  <td> Law </td>
                  <td>  66 </td>
                  <td> 30 </td>
                </tr>
                <tr>
                  <td> Sport Science </td>
                  <td>  15 </td>
                  <td> 5 </td>
                </tr>
                <tr>
                  <td> Arts and Design </td>
                  <td>  33 </td>
                  <td> 5 </td>
                </tr>
                <tr>
                  <td> Prince Al Hussein Bin Abdullah II School of International Studies </td>
                  <td>  17 </td>
                  <td> 6 </td>
                </tr>
                <tr>
                  <td> Foreign Languages </td>
                  <td>  26 </td>
                  <td> 12 </td>
                </tr>
                <tr>
                  <td> ArchaeologyandTourism </td>
                  <td>  19 </td>
                  <td> 3 </td>
                </tr>
                <tr>
                  <td> Science </td>
                  <td>  22 </td>
                  <td> 16 </td>
                </tr>
                <tr>
                  <td> Agriculture </td>
                  <td>  15 </td>
                  <td> 2 </td>
                </tr>
                <tr>
                  <td> Engineering </td>
                  <td>  31 </td>
                  <td> 7 </td>
                </tr>
                <tr>
                  <td> IT </td>
                  <td>  15 </td>
                  <td> 3 </td>
                </tr>
                <tr>
                  <td> Medicine </td>
                  <td>  30 </td>
                  <td> 10 </td>
                </tr>
                <tr>
                  <td> Nursing </td>
                  <td>  16 </td>
                  <td> 6 </td>
                </tr>
                <tr>
                  <td> Pharmacy </td>
                  <td>  25 </td>
                  <td> 13 </td>
                </tr>
                <tr>
                  <td> Dentistry </td>
                  <td>  10 </td>
                  <td> 0 </td>
                </tr>
                <tr>
                  <td> RehabilitationSciences </td>
                  <td>  12 </td>
                  <td> 2 </td>
                </tr>
                   
              </tbody>
              </table> 
              </div>
             </section>
                     
                        <!--Third section -->
                        <div class="row">
                          <div class="col" style="padding-left: 40px;padding-bottom: 40px;">
                        <span class="icon" style="float: center;">
                          <img class="skill" src="reason.png" width="60" alt="skill-img">
                        </span>
                        <label id="scrollspyHeading5"  style="font-family:Montserrat;color: #2f3e46;font-size: 2rem;padding-left: 10px; padding-top: 30px;"> Analyzes of reasons</label>
                          </div>
                        </div>

                        <div class="row" align="center"  style="margin-right: 20px;">
                             <div class="col-lg-4">
                              <div class="wrap">
                                <span class="icon" style="float: center;">
                                  <img class="skill" src="coronavirus.png" width="60" alt="skill-img">
                                </span>
                                <label style="font-size: 2rem;">illnes</label>
                                <hr/>
                                  <div class="row">
                                    <div class="col">
                                        <?php 
                                        $illness=$database->prepare("SELECT id FROM student WHERE reason='illness'");
                                        $illness->execute();
                  
                                    $numberofdoners=$database->prepare("SELECT `numberofDonation` FROM `donations` WHERE `reason`='illness'");
                                    $numberofdoners->execute();
                                        ?>
                                       <label>Number of registered</label>
                                    </div>
                                    <div class="col">
                                       <span><?php echo $illness->RowCount(); ?></span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                       <label> The number of donors</label>
                                    </div>
                                    <div class="col">
                                       <span><?php echo $numberofdoners->RowCount(); ?></span>
                                    </div>
                                  </div>
                                </div>
                             </div>
                             <div class="col-lg-4">
                              <div class="wrap">
                                <span class="icon" style="float: center;">
                                  <img class="skill" src="funeral.png" width="60" alt="skill-img">
                                </span>
                                <label style="font-size: 2rem;">Orphan</label>
                                <hr/>
                                  <div class="row">
                                    <div class="col">
                                       <label>Number of registered</label>
                                    </div>
                                      <?php 
                                        $orphan=$database->prepare("SELECT * FROM `student` WHERE reason='orphan'");
                                        $orphan->execute();
                  
                                    $numberofdoners=$database->prepare("SELECT `numberofDonation` FROM `donations` WHERE `reason`='orphan'");
                                    $numberofdoners->execute();
                                        ?>
                                    <div class="col">
                                       <span><?php echo $orphan->RowCount(); ?></span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                       <label> The number of donors</label>
                                    </div>
                                    <div class="col">
                                       <span><?php echo $numberofdoners->RowCount(); ?></span>
                                    </div>
                                  </div>
                                </div>
                             </div>
                             <div class="col-lg-4">
                              <div class="wrap">
                                <span class="icon" style="float: center;">
                                  <img class="skill" src="vulnerable.png" width="60" alt="skill-img">
                                </span>
                                <label style="font-size: 2rem;">Pockets of poverty</label>
                                <hr/>
                                  <div class="row">
                                    <div class="col">
                                       <label>Number of registered</label>
                                    </div>
                                      <?php 
                                        $Pocketsofpoverty=$database->prepare("SELECT * FROM `student` WHERE reason='Pockets of poverty'");
                                        $Pocketsofpoverty->execute();
                  
                                    $numberofdoners=$database->prepare("SELECT `numberofDonation` FROM `donations` WHERE `reason`='Pockets of poverty'");
                                    $numberofdoners->execute();
                                        ?>
                                    <div class="col">
                                       <span><?php echo $Pocketsofpoverty->RowCount(); ?></span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                       <label> The number of donors</label>
                                    </div>
                                    <div class="col">
                                       <span><?php echo $numberofdoners->RowCount(); ?></span>
                                    </div>
                                  </div>
                                </div>
                             </div>
                        </div>
                        <div class="row" align="center">
                          <div class="col-lg-6">
                            <div class="wrap" style="width: 75%;">
                              <span class="icon" style="float: center;">
                                <img class="skill" src="no-poverty.png" width="60" alt="skill-img">
                              </span>
                              <label style="font-size: 2rem;">People of determination</label>
                              <hr/>
                                <div class="row">
                                  <div class="col">
                                     <label>Number of registered</label>
                                  </div>
                                  <div class="col">
                                      <?php 
                                        $Peopleofdetermination=$database->prepare("SELECT * FROM `student` WHERE reason='People of determination'");
                                        $Peopleofdetermination->execute();
                  
                                    $numberofdoners=$database->prepare("SELECT `numberofDonation` FROM `donations` WHERE `reason`='People of determination'");
                                    $numberofdoners->execute();
                                        ?>
                                     <span><?php echo $Peopleofdetermination->RowCount(); ?></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                     <label> The number of donors</label>
                                  </div>
                                  <div class="col">
                                     <span><?php echo $numberofdoners->RowCount(); ?></span>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="wrap" style="width: 75%;">
                              <span class="icon" style="float: center;">
                                <img class="skill" src="more.png" width="60" alt="skill-img">
                              </span>
                              <label style="font-size: 2rem;">Others</label>
                              <hr/>
                                <div class="row">
                                  <div class="col">
                                     <label>Number of registered</label>
                                  </div>
                                  <div class="col">
                                      <?php 
                                        $Others=$database->prepare("SELECT * FROM `student` WHERE reason='Others'");
                                        $Others->execute();
                  
                                    $numberofdoners=$database->prepare("SELECT `numberofDonation` FROM `donations` WHERE `reason`='Others'");
                                    $numberofdoners->execute();
                                        ?>
                                     <span><?php echo $Others->RowCount(); ?></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                     <label> The number of donors</label>
                                  </div>
                                  <div class="col">
                                     <span><?php echo $numberofdoners->RowCount(); ?></span>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>

                        <hr/>
                        
    </body>
</html>