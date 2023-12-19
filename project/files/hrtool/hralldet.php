<?php 
require_once('user.php');
require_once('db.php');

if (isset($_POST['usub'])) {
    $uid = $_POST['uid'];
    $user = new User($conn);
    $selected = $user->selall($uid);
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

    <h1>User Details</h1>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>User ID</th>
                    <td><?php echo $selected['user_id']; ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $selected['name']; ?></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><?php echo $selected['last_name']; ?></td>
                </tr>
                <tr>
                    <th>Primary Contact</th>
                    <td><?php echo $selected['primary_contact']; ?></td>
                </tr>
                <tr>
                    <th>Secondary Contact</th>
                    <td><?php echo $selected['secondary_contact']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $selected['email']; ?></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><?php echo $selected['dob']; ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo $selected['address']; ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo $selected['gender']; ?></td>
                </tr>
                <tr>
                    <th>State</th>
                    <td><?php echo $selected['state']; ?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><?php echo $selected['city']; ?></td>
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td><?php echo $selected['nationality']; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table">
                <!-- Continue adding your fields here -->
                <tr>
                    <th>DP Storage Path</th>
                    <td>

                        <img src=" <?php echo $selected['dp_storage_path']; ?>" class="rounded-5" style="width: 100px; height: 100px;">
                       
                        
                    </td>
                </tr>
                <tr>
                    <th>School 10th Name</th>
                    <td><?php echo $selected['school_10th_name']; ?></td>
                </tr>
                <tr>
                    <th>School 10th Year</th>
                    <td><?php echo $selected['school_10th_year']; ?></td>
                </tr>
                <tr>
                    <th>School 10th Percentage</th>
                    <td><?php echo $selected['school_10th_percentage']; ?></td>
                </tr>
                <tr>
                    <th>School 12th Name</th>
                    <td><?php echo $selected['school_12th_name']; ?></td>
                </tr>
                <tr>
                    <th>School 12th Year</th>
                    <td><?php echo $selected['school_12th_year']; ?></td>
                </tr>
                <tr>
                    <th>School 12th Percentage</th>
                    <td><?php echo $selected['school_12th_percentage']; ?></td>
                </tr>
                <tr>
                    <th>College Name</th>
                    <td><?php echo $selected['college_name']; ?></td>
                </tr>
                <tr>
                    <th>University Name</th>
                    <td><?php echo $selected['university_name']; ?></td>
                </tr>
                <tr>
                    <th>Graduation Percentage</th>
                    <td><?php echo $selected['graduation_percentage']; ?></td>
                </tr>
                <tr>
                    <th>Graduation Year</th>
                    <td><?php echo $selected['graduation_year']; ?></td>
                </tr>
                <tr>
                    <th>Stream</th>
                    <td><?php echo $selected['stream']; ?></td>
                </tr>
                <tr>
                    <th>Experience</th>
                    <td><?php echo $selected['experience']; ?></td>
                </tr>
                <tr>
                    <th>Number of Experiences</th>
                    <td><?php echo $selected['no_of_expe']; ?></td>
                </tr>
                <tr>
                    <th>Skills</th>
                    <td><?php echo $selected['skills']; ?></td>
                </tr>
                <tr>
                    <th>Certifications</th>
                    <td><?php echo $selected['certifications']; ?></td>
                </tr>
                <tr>
                    <th>Languages</th>
                    <td><?php echo $selected['languages']; ?></td>
                </tr>
                <tr>
                    <th>Backlog</th>
                    <td><?php echo $selected['backlog']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

            <div class="row mt-3">
            <div class="col-md-12">
                <a href="applications.php" class="btn btn-danger">Go to application</a>
            </div>
        </div>
</body>
</html>