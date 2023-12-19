<?php
require_once('db.php');
require_once('dohr.php');
require_once('user.php');

$dohr = new Hr($conn);
$selemp = $dohr->selemployee();
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
<h1>Employee Deatails</h1>
<div class="container-fluid mt-3"> 
<div class="table-responsive">          
  <table class="table table-success table-hover shadow-lg ">
    <thead>
      <tr>
        <th>Employee ID</th>
        <th>Password</th>
        <th>User ID</th>
        <th>Joining ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Primary number</th>
        <th>Secondary number</th>
        <th>Blood</th>
        <th>Date of birth</th>
        <th>Gender</th>
        <th>Graduation year</th>
        <th>10th marksheet</th>
        <th>12th marksheet</th>
        <th>UG Certificate</th>
        <th>PG Certificate</th>
        <th>Aadhar card</th>
        <th>Pan Card</th>
        <th>Photo</th>
        <th>Sign</th>
        <th>Experience certificate</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>

            <tr>
            <?php
            if ($selemp) {
                while ($selem = $selemp->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $selem['emp_id']; ?></td>

                        <td>
                            <?php echo $selem['pass']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="cpass" value="<?php echo $selem['pass']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                              <input type="hidden" name="emptable" value="pass">
                              <input type="submit" name="cpass1" value="change" class="btn btn-info mt-2">
                            </form> 
                        </td>

                        <td><?php echo $selem['user_id']; ?></td>
                        <td><?php echo $selem['join_id']; ?></td>

                        <td>
                            <?php echo $selem['f_name']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="cfn" value="<?php echo $selem['f_name']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="f_name">
                              <input type="submit" name="cfn1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <?php echo $selem['l_name']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="cln" value="<?php echo $selem['l_name']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="l_name">
                              <input type="submit" name="cln1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <?php echo $selem['email']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="cemail" value="<?php echo $selem['email']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="email">
                              <input type="submit" name="cemail1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <?php echo $selem['pri_number']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="cpri" value="<?php echo $selem['pri_number']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="pri_number">
                              <input type="submit" name="cpri1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <?php echo $selem['sec_number']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="csec" value="<?php echo $selem['sec_number']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="sec_number">
                              <input type="submit" name="csec1" value="change" class="btn btn-info mt-2">
                            </form>    
                        </td>

                        <td>
                            <?php echo $selem['blood']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="cbl" value="<?php echo $selem['blood']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="blood">
                              <input type="submit" name="cbl1" value="change" class="btn btn-info mt-2">
                            </form> 
                        </td>

                        <td>
                            <?php echo $selem['dob']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="cdob" value="<?php echo $selem['dob']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="dob">
                              <input type="submit" name="cdob1" value="change" class="btn btn-info mt-2">
                            </form>    
                        </td>

                        <td>
                            <?php echo $selem['gender']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="cgen" value="<?php echo $selem['gender']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="gender">
                              <input type="submit" name="cgen1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <?php echo $selem['graduation_year']; ?>
                            <hr>
                            <form method="post" action="success.php">
                              <input type="text" class="form-control" name="cyear" value="<?php echo $selem['graduation_year']; ?>">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="graduation_year">
                              <input type="submit" name="cyear1" value="change" class="btn btn-info mt-2">
                            </form>    
                        </td>

                        <td>
                            <a class="btn btn-secondary" href="<?php echo $selem['10th']; ?>" target="_blank">Download 10 mark</a>
                            <hr>
                            <form method="post" action="success.php" enctype="multipart/form-data">
                              <input type="file" class="form-control" name="c10" accept=".pdf,.doc,.docx">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="10th">
                              <input type="submit" name="c101" value="change" class="btn btn-info mt-2">
                            </form>     
                        </td>

                        <td>
                            <a class="btn btn-secondary" href="<?php echo $selem['12th']; ?>" target="_blank">Download 12 mark</a>
                            <hr>
                            <form method="post" action="success.php" enctype="multipart/form-data">
                              <input type="file" class="form-control" name="c12" accept=".pdf,.doc,.docx">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="12th">
                              <input type="submit" name="c121" value="change" class="btn btn-info mt-2">
                            </form> 
                        </td>

                        <td>
                            <a class="btn btn-secondary" href="<?php echo $selem['ug']; ?>" target="_blank">Download UG</a>
                            <hr>
                            <form method="post" action="success.php" enctype="multipart/form-data">
                              <input type="file" class="form-control" name="cug" accept=".pdf,.doc,.docx">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="ug">
                              <input type="submit" name="cug1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <a class="btn btn-secondary" href="<?php echo $selem['pg']; ?>" target="_blank">Download PG</a>
                            <hr>
                            <form method="post" action="success.php" enctype="multipart/form-data">
                              <input type="file" class="form-control" name="cpg" accept=".pdf,.doc,.docx">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="pg">
                              <input type="submit" name="cpg1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                        <a class="btn btn-secondary" href="<?php echo $selem['aadhar']; ?>" target="_blank">Download Aadhar</a>
                            <hr>
                            <form method="" action="success.php" enctype="multipart/form-data">
                              <input type="file" class="form-control" name="caa" accept=".pdf,.doc,.docx">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="aadhar">
                              <input type="submit" name="caa1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <a class="btn btn-secondary" href="<?php echo $selem['pan']; ?>" target="_blank">Download Pan card</a>
                            <hr>
                            <form method="post" action="success.php" enctype="multipart/form-data">
                              <input type="file" class="form-control" name="cpan" accept=".pdf,.doc,.docx">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="pan">
                              <input type="submit" name="cpan1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <img src="<?php echo $selem['photo']; ?>" style="width: 100px; height: 100px;">
                            <hr>
                            <form method="post" action="success.php" enctype="multipart/form-data">
                              <input type="file" class="form-control" name="cpho" accept="image/*">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="photo">
                              <input type="submit" name="cpho1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <img src="<?php echo $selem['sign']; ?>" style="width: 100px; height: 100px;">

                            <hr>
                            <form method="post" action="success.php" enctype="multipart/form-data">
                              <input type="file" class="form-control" name="csin" accept="image/*">
                              <input type="hidden" name="empid" value="<?php echo $selem['emp_id']; ?>">
                               <input type="hidden" name="emptable" value="sign">
                              <input type="submit" name="csin1" value="change" class="btn btn-info mt-2">
                            </form>
                        </td>

                        <td>
                            <form method="post" action="seedochr.php">
                                <input type="hidden" name="user_ids" value="<?php echo $selem['emp_id']; ?>">
                                <input type="submit" name="seeviewhr" class="btn btn-warning" value="VIEW EXPERIENCE DOCUMENTS">
                            </form>

                        </td>


                        <td>
                            <form method="post" action="success.php">
                                <input type="hidden" name="empids" value="<?php echo $selem['emp_id']; ?>">
                                <input type="submit" class="btn btn-danger" name="emps" value="Remove Employee">
                            </form>
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
