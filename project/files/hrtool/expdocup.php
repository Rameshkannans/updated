
<?php
session_start();
require_once('db.php');
require_once('dohr.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];

$dohr = new Hr($conn);
$selveri = $dohr->seljoinid($user_id);
if ($selveri) {
    $row = mysqli_fetch_assoc($selveri);
} else {
    echo "No result found.";
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
<body class="bg-warning">




            <div class=" row text-center justify-content-center mt-5">
              <div class="col-md-4">
                <div class="card">
                    <div class="card-body">


                      <form method="post" class="d-flex" enctype="multipart/form-data" action="success.php">
                        <div class="mb-3">
                            <label for="experienceCertificate" class="form-label"><strong>Experience Certificate</strong> </label>
                            <input type="file" class="form-control mt-2" id="experienceCertificate" accept=".pdf, .doc, .docx" name="experienceCertificate[]">
                            <input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="euserid">
                            <input type="hidden" name="joid" value="<?php echo $row['joining_id']; ?>">
                            <button class="btn btn-primary mt-2" type="button" onclick="addMore()">ADD</button>
                        </div>
                        <input type="hidden" name="send" value="Doc_sending_successfully">
                        <input type="submit" name="expedoup" class="btn btn-danger ms-5" value="SUBMIT">
                    </form>
                    <script>
                        function addMore() {
                            var clone = document.getElementById('experienceCertificate').cloneNode(true);
                            document.getElementById('experienceCertificate').parentNode.appendChild(clone);
                        }
                    </script>



                    </div>
                  </div>
              </div>
            </div>




</body>
</html>