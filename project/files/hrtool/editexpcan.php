<?php
session_start();
require_once('db.php');
require_once('dohr.php');

if (isset($_POST['edit'])) {
	$edjoid  = $_POST['edjoid'];
	$edituid = $_POST['edituid'];
	$dohr = new Hr($conn);
	$ediveri = $dohr->editvericheck($edjoid);
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

	<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">

            <div class="">
                <table class="table table-success table-hover shadow-lg ">
                    <thead>
                    <tr>
                        <th>Verification ID</th>
                        <th>User ID</th>
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
                        <th>Experience Certificate</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($ediveri) {
                        while ($viewverifi = $ediveri->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $viewverifi['joining_id']; ?></td>
                                <td><?php echo $viewverifi['vuser_id']; ?></td>

                                <td class="text-center">
                                    <?php echo $viewverifi['first_name']; ?>
                                    <hr>
                                    <form method="post" class="mt-4" action="success.php">
                                        <input type="text" class="form-control" name="upname">
                                        <input type="hidden" name="fnid" value="<?php echo $viewverifi['joining_id']; ?>">
                                        <input type="hidden" name="f_n" value="first_name">
                                        <input type="submit" name="fns" class="btn btn-info mt-1" value="change">
                                    </form>
                                </td>

                                <td class="text-center">
                                	<?php echo $viewverifi['last_name']; ?>
                                	<hr>
                                    <form method="post" class="mt-4" action="success.php">
                                        <input type="text" class="form-control" name="upnamel">
                                        <input type="hidden" name="fnid" value="<?php echo $viewverifi['joining_id']; ?>">
                                        <input type="hidden" name="l_n" value="last_name">
                                        <input type="submit" name="lns" class="btn btn-info mt-1" value="change">
                                    </form>
                                </td>


                                <td><?php echo $viewverifi['vemail']; ?></td>
                                <td><?php echo $viewverifi['primary_number']; ?></td>
                                <td><?php echo $viewverifi['secondary_number']; ?></td>
                                <td><?php echo $viewverifi['blood_group']; ?></td>
                                <td><a class="btn btn-info" href="<?php echo $viewverifi['10th_mark_sheet']; ?>" target="_blank">Download 10th mark</a></td>
                                <td><a class="btn btn-info" href="<?php echo $viewverifi['12th_mark_sheet']; ?>" target="_blank">Download 12th mark</a></td>
                                <td><a class="btn btn-info" href="<?php echo $viewverifi['ug_certificate']; ?>" target="_blank">Download UG</a></td>
                                <td><a class="btn btn-info" href="<?php echo $viewverifi['pg_certificate']; ?>" target="_blank">Download PG</a></td>
                                <td><a class="btn btn-info" href="<?php echo $viewverifi['aadhar_card']; ?>" target="_blank">Download Aadhar</a></td>
                                <td><a class="btn btn-info" href="<?php echo $viewverifi['pan_card']; ?>" target="_blank">Download PAN</a></td>
                                <td><img src="<?php echo $viewverifi['photo']; ?>" class="rounded-5" style="width: 100px; height: 100px;"> </td>
                                <td><img src="<?php echo $viewverifi['signature']; ?>" class="rounded-5" style="width: 100px; height: 100px;"> </td>
                                <td>
                                    <form method="post" action="chcanexdoc.php">
                                        <input type="hidden" name="canviewid" value="<?php echo $viewverifi['vuser_id']; ?>">
                                        <input type="submit" class="btn btn-warning" name="canview" value="EXPERIENCE CERTIFICATE">
                                    </form>
                                </td>
                                <td>
                                    <button class="btn btn-danger p-2" disabled><strong><?php echo $viewverifi['versatus']; ?></strong></button>
                                </td>
                                <td>
                                    <form method="post" action="editexpcan.php">
                                        <input type="hidden" name="edjoid" value="<?php echo $viewverifi['joining_id']; ?>">
                                        <input type="submit" name="edit" class="btn btn-success" value="EDIT">
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
    </div>
</div>

</body>
</html>