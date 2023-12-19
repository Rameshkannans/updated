<?php
session_start();
require_once('db.php');
require_once('dohr.php');
require_once('user.php');

if (isset($_POST['canview'])) {
    $canviewjoinid = $_POST['canviewjoinid'];
    $dohr = new Hr($conn);
    $resultvi = $dohr->candviewid($canviewjoinid);
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
		  <table class="table table-warning p-5 table-hover shadow-lg text-center">
		    <thead>
		      <tr>
		        <th><h1 class="text-primary">Experience Documents</h1></th>
		      </tr>
		    </thead>
		    <tbody>
		    	<tr>
		    <?php while ($ro = mysqli_fetch_assoc($resultvi)) { ?>
		          <td><a class="btn btn-warning" href="<?php echo $ro['documents']; ?>" target="_blank">Download Certificates</a></td>
		        </tr>
		    <?php } ?>
		    </tbody>
		  </table>
  		</div>
  		<div class="row mt-3">
		  <div class="col-md-12">
		    <a href="cerveri.php" class="btn btn-secondary">Go to Dashboard</a>
		 </div>
	</div>
</div>
</body>
</html>
<!-- <td class="p-4"> -->
		          	<!-- <form method="post" enctype="multipart/form-data" action="success.php">
					    <input type="file" name="editexdoc" class="form-control" accept=".pdf,.doc,.docx">
					    <input type="hidden" name="ejoin_ids" value="<?php echo $ro['expe_id']; ?>">
					    <input type="submit" class="btn btn-success mt-4" name="expdocedit">
					</form> -->
		          <!-- </td> -->