<?php
session_start();
require_once('db.php');
require_once('dohr.php');
require_once('user.php');


if (isset($_POST['seeviewhr'])) {
    $user_ids = $_POST['user_ids'];
    $dohr = new Hr($conn);
    $seedochrs = $dohr->seedochr($user_ids);

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
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <form method="post" action="seedochr.php"> <!-- Add a form tag for submission -->
                <!-- Add any necessary input fields or hidden inputs here -->
                <table class="table table-warning p-5 table-hover shadow-lg text-center">
                    <thead>
                    <tr>
                        <th><h1 class="text-primary">Experience Documents</h1></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($roe = mysqli_fetch_assoc($seedochrs)) { ?>
                        <tr>
                            <td><a class="btn btn-warning" href="<?php echo $roe['emp_documents']; ?>"
                                   target="_blank">Download Certificates</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="empdeatail.php" class="btn btn-secondary">Go to Dashboard</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
