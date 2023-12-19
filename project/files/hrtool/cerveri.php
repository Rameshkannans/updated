<?php
session_start();
require_once('db.php');
require_once('dohr.php');
require_once('user.php');

$dohr = new Hr($conn);
$selveri = $dohr->selverification();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="row mt-3">
  <div class="col-md-12">
    <a href="hrdash.php" class="btn btn-secondary">Go to dashboad</a>
  </div>
</div>
<h1>CERTIFICATE VERIFICATION</h1>
<div class="container-fluid mt-3"> 
<div class="table-responsive">          
  <table class="table table-success table-hover shadow-lg ">
    <thead>
      <tr>
        <th>Doc ID</th>
        <th class="text-center">User ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>User email</th>
        <th>Primary Contact</th>
        <th>Secondary Contact</th>
        <th>Blood group</th>
        <th>10th mark sheet</th>
        <th>12th mark sheet</th>
        <th>UG certificate</th>
        <th>PG certificate</th>
        <th>Aadhar card</th>
        <th>Pan card</th>
        <th>Photo</th>
        <th>Signature</th>
        <th>Experience ertificate</th>
        <th>candidate staus</th>
        <th>Status(to Candizdate)</th>
        <th>Add Employee</th>
        <th>Remove Employee</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($selveri) {
          while ($row = $selveri->fetch_assoc()) {
            
      ?>
            <tr>
                <td><?php echo $row['joining_id']; ?></td>


                <td class="text-center">
                    <?php echo $row['vuser_id']; ?>
                    <hr>
                    <form method="post" action="checkuser.php">
                        <input type="hidden" name="usidd" value="<?php echo $row['vuser_id']; ?>">
                        <input type="submit" name="seeview" value="View User" class="btn btn-secondary">
                    </form>        
                </td>

                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['vemail']; ?></td>
                <td><?php echo $row['primary_number']; ?></td>
                <td><?php echo $row['secondary_number']; ?></td>
                <td><?php echo $row['blood_group']; ?></td>

                <?php 
                $dohr = new Hr($conn);
                $joinstatu = $row['joining_id'];
                $hrviewveri = $dohr->hrviewvericheck($joinstatu);
                $hrViewResult = mysqli_fetch_assoc($hrviewveri);
                ?>
                
                <td><a class="btn btn-info" href="<?php echo $row['10th_mark_sheet']; ?>" target="_blank">Download 10th mark</a></td>
                <td><a class="btn btn-info" href="<?php echo $row['12th_mark_sheet']; ?>" target="_blank">Download 12th mark</a></td>
                <td><a class="btn btn-info" href="<?php echo $row['ug_certificate']; ?>" target="_blank">Download UG</a></td>
                <td><a class="btn btn-info" href="<?php echo $row['pg_certificate']; ?>" target="_blank">Download PG</a></td>
                <td><a class="btn btn-info" href="<?php echo $row['aadhar_card']; ?>" target="_blank">Download AAdhar</a></td>
                <td><a class="btn btn-info" href="<?php echo $row['pan_card']; ?>" target="_blank">Download PAN</a></td>
                <td><img src="<?php echo $row['photo']; ?>" class="rounded-5" style="width: 100px; height: 100px;"> </td>
                <td><img src="<?php echo $row['signature']; ?>" class="rounded-5" style="width: 100px; height: 100px;"> </td>

                <td>
                    <form method="post" action="seexpdo.php">
                        <input type="hidden" name="canviewid" value="<?php echo $row['vuser_id']; ?>">
                        <input type="hidden" name="canviewjoinid" value="<?php echo $row['joining_id']; ?>">
                        <input type="submit" class="btn btn-warning py-4" name="canview" value="EXPERIENCE CERTIFICATE">
                    </form>

                </td>

                <td>
                    <button class="btn btn-danger py-4" disabled ><b><?php echo $hrViewResult['versatus']; ?></b></button>
                </td>

                       <td>
                            <form method="post" action="success.php">
                            <select class="form-control mt-2" name="veristau">
                                <option value="waiting">Waiting</option>
                                <option value="checking">Checking</option>
                                <option value="check_certificate">Error</option>
                                <option value="welcome_our_organization" class="text-success">Done</option>
                                <option value="try_next_time" class="text-danger">Try Next Time</option>
                            </select>
                            <input type="hidden" name="verifidocid" value="<?php echo $row['joining_id']; ?>">
                            <input type="submit" name="veristatussub" class="btn btn-secondary mt-2">
                        </form>

                        </td>


                        <?php 
                            $dohr = new Hr($conn);
                            $ussid = $row['vuser_id'];
                            $result_sets = $dohr->uscerverids($ussid);
                        ?>


                       <td>
                    <form method="post" action="success.php" enctype="multipart/form-data">
                        <input type="hidden" name="epass" value="<?php echo $row['first_name']; ?>1234">
                        <input type="hidden" name="euserid" value="<?php echo $row['vuser_id']; ?>">
                        <input type="hidden" name="ejoinid" value="<?php echo $row['joining_id']; ?>">
                        <input type="hidden" name="efn" value="<?php echo $row['first_name']; ?>">
                        <input type="hidden" name="eln" value="<?php echo $row['last_name']; ?>">
                        <input type="hidden" name="eemail" value="<?php echo $row['vemail']; ?>">
                        <input type="hidden" name="epn" value="<?php echo $row['primary_number']; ?>">
                        <input type="hidden" name="esn" value="<?php echo $row['secondary_number']; ?>">
                        <input type="hidden" name="eblood" value="<?php echo $row['blood_group']; ?>">
                        <input type="hidden" name="dob" value="<?php echo $result_sets['dob']; ?>">
                        <input type="hidden" name="gender" value="<?php echo $result_sets['gender']; ?>">
                        <input type="hidden" name="graduation_year" value="<?php echo $result_sets['graduation_year']; ?>">
                        <input type="hidden" name="t10th_mark_sheet"  value="<?php echo $row['10th_mark_sheet'];  ?>">
                        <input type="hidden" name="t12th_mark_sheet" value="<?php echo $row['12th_mark_sheet']; ?>">
                        <input type="hidden" name="ug_certificate" value="<?php echo $row['ug_certificate']; ?>">
                        <input type="hidden" name="pg_certificate" value="<?php echo $row['pg_certificate']; ?>">
                        <input type="hidden" name="aadhar_card" value="<?php echo $row['aadhar_card']; ?>">
                        <input type="hidden" name="pan_card" value="<?php echo $row['pan_card']; ?>">
                        <input type="hidden" name="photo" value="<?php echo $row['photo']; ?>">
                        <input type="hidden" name="signature" value="<?php echo $row['signature']; ?>">
                        <input type="hidden" name="vuser_id" value="<?php echo $row['vuser_id']; ?>">

                       <?php 
                            $canviewjoinid = $row['joining_id'];
                            $dohr = new Hr($conn);
                            $resultvi = $dohr->candviewid($canviewjoinid);

                            $documentPaths = array();

                            while ($ro = mysqli_fetch_assoc($resultvi)) {
                                $documents = $ro['documents'];
                                $documentPaths = array_merge($documentPaths, explode(',', $documents));
                            }
                        ?> 
                            <input type="hidden" name="exdoc" value="<?php echo implode(',', $documentPaths); ?>">


                        <?php
                        if ($hrViewResult['versatus'] == 'welcome_our_organization') {
                            echo '<input type="submit" name="empadd" value="ADD EMPLOYEE" class="btn btn-success py-4">';
                        } else {
                            echo '<input type="submit" name="empadd" value="ADD EMPLOYEE" class="btn btn-success py-4" disabled>';
                        }
                        ?>
                    </form>
                    </td>

                    <td>
                        <?php
                        if ($hrViewResult['versatus'] == 'try_next_time') {?>
                                    <form method="post" action="success.php">
                                        <input type="hidden" name="joinidd" value="<?php echo $row['joining_id']; ?>">
                                        <input type="submit" name="remcan" class="btn btn-danger py-4" value="Remove Candidate">
                                    </form>
                      <?php  } else { ?>
                                    <form method="post" action="success.php">
                                        <input type="hidden" name="joinidd" value="<?php echo $row['joining_id']; ?>">
                                        <input type="submit" name="remcan" class="btn btn-danger py-4" value="Remove Candidate" disabled>
                                    </form>
                       <?php }
                        ?>
                    </td>
                      
            </tr>
      <?php
          }
      }
      ?>
    </tbody>
  </table>
  </div>
</div>


</body>
</html>
