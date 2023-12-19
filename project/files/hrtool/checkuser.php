<?php
session_start();
include 'db.php';
include 'user.php';
require_once('dohr.php');
if (isset($_POST['seeview'])) {
    $usidd = $_POST['usidd'];
    $dohr = new Hr($conn);
    $getuser = $dohr->chus($usidd);

    // if ($getuser) {
    //     echo $getuser['name'];
    //     echo $getuser['email'];
    // } else {
    //     echo "User not found.";
    // }
}
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
</head>
<body>

	<div class="container my-5">
        <h2>Welcome, <?php echo $getuser['name']; ?> <?php echo $getuser['last_name']; ?>  !</h2>
        <div class="row mt-3">
            <div class="col-md-6">
                <p><strong>Email:</strong> <?php echo $getuser['email'] ; ?></p>
                <p><strong>Primary Contact:</strong> <?php echo $getuser['primary_contact']; ?></p>
                <p><strong>Secondary Contact:</strong> <?php echo $getuser['secondary_contact']; ?></p>
                <p><strong>Date of Birth:</strong> <?php echo $getuser['dob']; ?></p>
                <p><strong>Address:</strong> <?php echo $getuser['address']; ?></p>
                <p><strong>Gender:</strong> <?php echo $getuser['gender']; ?></p>
                <p><strong>State:</strong> <?php echo $getuser['state']; ?></p>
                <p><strong>City:</strong> <?php echo $getuser['city']; ?></p>
                <p><strong>Nationality:</strong> <?php echo $getuser['nationality']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>10th School Name:</strong> <?php echo $getuser['school_10th_name']; ?></p>
                <p><strong>10th Completion Year:</strong> <?php echo $getuser['school_10th_year']; ?></p>
                <p><strong>10th Percentage:</strong> <?php echo $getuser['school_10th_percentage']; ?></p>
                <p><strong>12th School Name:</strong> <?php echo $getuser['school_12th_name']; ?></p>
                <p><strong>12th Completion Year:</strong> <?php echo $getuser['school_12th_year']; ?></p>
                <p><strong>12th Percentage:</strong> <?php echo $getuser['school_12th_percentage']; ?></p>
                <p><strong>Graduation College Name:</strong> <?php echo $getuser['college_name']; ?></p>
                <p><strong>University Name:</strong> <?php echo $getuser['university_name']; ?></p>
                <p><strong>Percentage:</strong> <?php echo $getuser['graduation_percentage']; ?></p>
                <p><strong>Graduation Completion Year:</strong> <?php echo $getuser['graduation_year']; ?></p>
                <p><strong>Stream:</strong> <?php echo $getuser['stream']; ?></p>
                <p><strong>Experience or Fresher:</strong> <?php echo $getuser['experience']; ?></p>
                <p><strong>No.of Experience:</strong> <?php echo $getuser['no_of_expe']; ?></p>
                <p><strong>Skills:</strong> <?php echo $getuser['skills']; ?></p>
                <p><strong>Certifications:</strong> <?php echo $getuser['certifications']; ?></p>
                <p><strong>Languages:</strong> <?php echo $getuser['languages']; ?></p>
                <p><strong>Backlog:</strong> <?php echo $getuser['backlog']; ?></p>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-6">
                <img src="<?php echo $getuser['dp_storage_path']; ?>" alt="Profile Photo"  class="img-fluid" style="width: 200px; height: 200px;">
            </div>
        </div>
    </div>


    <div class="row mt-3">
            <div class="col-md-12">
                <a href="cerveri.php" class="btn btn-danger">Go to Verification</a>
            </div>
        </div>

</body>
</html>