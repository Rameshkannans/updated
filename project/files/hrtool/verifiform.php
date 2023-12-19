<?php
session_start();
require_once('db.php');
require_once('dohr.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];


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

  <h1 class="text-center">VERIFICATION FORM</h1>




<!--         <div class=" row text-center justify-content-center">
          <div class="col-md-4">
              <form method="post" enctype="multipart/form-data" action="success.php">
                  <div class="mb-3">
                      <label for="experienceCertificate" class="form-label">Experience Certificate <strong>(please first upload the certification and submit after you have fill the ather requirements)</strong></label>
                      <input type="file" class="form-control" id="experienceCertificate" accept=".pdf, .doc, .docx" name="experienceCertificate">
                      <input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="euserid">
                  </div>
                  <input type="submit" name="expedoup" class="btn btn-danger" value="SUBMIT">
              </form>
          </div>
        </div> -->


      <div class="container mt-5">
        <form method="post"  action="success.php" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="vfirstName"  required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="vlastName" required>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="vemail" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="primaryNumber" class="form-label">Primary Number</label>
                    <input type="tel" class="form-control" id="primaryNumber" name="vprimaryNumber" required>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="secondaryNumber" class="form-label">Secondary Number</label>
                    <input type="tel" class="form-control" id="secondaryNumber" name="vsecondaryNumber">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="10thMarksheet" class="form-label">10th Marksheet</label>
                    <input type="file" class="form-control" id="10thMarksheet" accept=".pdf, .doc, .docx" name="v10thMarksheet">
                </div>
            </div>
        </div>

      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="mb-3">
                  <label for="12thMarksheet" class="form-label">12th Marksheet</label>
                  <input type="file" class="form-control" id="12thMarksheet" accept=".pdf, .doc, .docx" name="v12thMarksheet">
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
                  <label for="ugCertificate" class="form-label">UG Certificate</label>
                  <input type="file" class="form-control" id="ugCertificate" accept=".pdf, .doc, .docx" name="vugCertificate">
              </div>
          </div>
      </div>

      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="mb-3">
                  <label for="pgCertificate" class="form-label">PG Certificate</label>
                  <input type="file" class="form-control" id="pgCertificate" accept=".pdf, .doc, .docx" name="vpgCertificate">
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
                  <label for="aadharCard" class="form-label">Aadhar Card</label>
                  <input type="file" class="form-control" id="aadharCard" accept=".pdf, .doc, .docx" name="vaadharCard">
              </div>
          </div>
      </div>

      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="mb-3">
                  <label for="panCard" class="form-label">PAN Card</label>
                  <input type="file" class="form-control" accept=".pdf, .doc, .docx" id="panCard" name="vpanCard">
              </div>
          </div>

          <div class="col-md-4">
              <div class="mb-3">
                  <label for="bloodGroup" class="form-label">Blood Group</label>
                  <input type="text" class="form-control"  id="bloodGroup" name="vbloodGroup">
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
                  <label for="photo" class="form-label">Photo</label>
                  <input type="file" class="form-control" accept="image/*" id="photo" name="vphoto">
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-md-4">
                  <div class="mb-3">
                      <label for="signature" class="form-label">Signature</label>
                      <input type="file" class="form-control" accept="image/*" id="signature" name="vsignature">
                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="text-center">
              <input type="hidden" class="form-select" name="certistatus" value="waiting">
              <input type="hidden" value="<?php echo $user_id; ?>" name="euserid1">
              <button type="submit" name="subveridoc" class="btn btn-primary">Next</button>
          </div>
      </div>
      </form>
    </div>

  <div class="row mt-3">
    <div class="col-md-12 text-center">
      <a href="dahboard.php" class="btn btn-danger">Go to dashboard</a>
    </div>
  </div>
</body>
</html>





