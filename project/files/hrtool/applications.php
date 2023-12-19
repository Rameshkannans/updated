<?php
session_start();
require_once('db.php');


require_once('dohr.php');
require_once('user.php');

$dohr = new Hr($conn);
$hrsel2 = $dohr->apptable();


if (isset($_POST['statussub'])) {
    $statusup = $_POST['stau'];
    $applie = $_POST['applie'];
    $dohr = new Hr($conn);
    $dohr->statusupdate($statusup,$applie);
}

if (isset($_POST['submit2'])) {
    $delapp = $_POST['delapp'];
    $isDeleted = $dohr->delapps($delapp);
    if ($isDeleted) {
        header('Location: applications.php');
    } else {
        echo "Failed to delete application.";
    }
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
<div class="row mt-3">
  <div class="col-md-12">
    <a href="hrdash.php" class="btn btn-secondary">Go to dashboad</a>
  </div>
</div>
<div class="container-fluid mt-3">           
  <table class="table table-success table-hover shadow-lg">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Job notification ID</th>
        <th>relevent experience</th>
        <th>Previous salary</th>
        <th>Expected salary</th>
        <th>resume</th>
        <th>Notice period</th>
        <th>Canditate Status</th>
        <th>status</th>
        <th>All Deatails</th>
        <th>Delete Application</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($hrsel2) {
          while ($row1 = $hrsel2->fetch_assoc()) {
      ?>
            <tr>
                <td>    
                    <?php echo $row1['auser_id']; ?>
                </td>
                <td><?php echo $row1['ajob_noti_id']; ?></td>
                <td><?php echo $row1['arelevent_experience']; ?></td>
                <td><?php echo $row1['pre_salary']; ?></td>
                <td><?php echo $row1['expected_salary']; ?></td>
                <td><a class="btn btn-info" href="<?php echo $row1['aresume']; ?>" target="_blank">Download Resume</a></td>
                <td><?php echo $row1['anotice_period']; ?></td>
                <td>
                <button class="btn btn-secondary " disabled><?php echo $row1['astatus']; ?></button>    
                </td>

                <td>
                    <form method="post">
                        <select class="form-control" name="stau">
                            <option value="waiting">Waiting</option>
                            <option value="interview_invitation">Interview Invitation</option>
                            <option value="processing">Processing</option>
                            <option value="selected">Selected</option>
                            <option value="try_next_time">Try Next Time</option>
                        </select>
                        <input type="hidden" name="applie" value="<?php echo $row1['app_id']; ?>">
                        <input type="submit" name="statussub" class="btn btn-success mt-2">
                    </form>
                </td>


                <td>
                    <form method="post" action="hralldet.php">
                        <input type="hidden" name="uid"  value="<?php echo $row1['auser_id']; ?>">
                        <input type="submit" name="usub" class="btn btn-secondary" value="View">
                    </form>

                </td>


                <td>
                <div class="col-md-12">
                <form method="post" action="applications.php">
                    <input type="hidden" name="delapp" value="<?php echo $row1['app_id']; ?>">
                    <div class="text-center">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal19">
                            REMOVE APPLICATION
                        </button>
                        <div class="modal fade" id="myModal19">
                            <div class="modal-dialog  modal-dialog-scrollable">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-primary">
                                        </h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <button type="submit" name="submit2" class="btn btn-danger">REMOVE APPLICATION</button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </td>
            </tr>
      <?php
          }
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
