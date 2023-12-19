<?php
$canviewjoinid = $row['joining_id'];
$dohr = new Hr($conn);
$resultvi = $dohr->candviewid($canviewjoinid);

while ($ro = mysqli_fetch_assoc($resultvi)) {
    $documents = $ro['documents'];
    $documentPaths = explode(',', $documents);

    foreach ($documentPaths as $documentPath) {

        $newFilePath = 'E:/xa/htdocs/hww/emp_doc/' . basename($documentPath);


        if (copy($documentPath, $newFilePath)) {
            $insertQuery = "INSERT INTO emp_expe (emp_documents) VALUES ('$newFilePath')";
            mysqli_query($conn, $insertQuery);
        } else {
            echo "Failed to copy the document: $documentPath";
        }
    }
}
?>



<?php 
                        $canviewjoinid = $row['joining_id'];
                        $dohr = new Hr($conn);
                        $resultvi = $dohr->candviewid($canviewjoinid);
                        while ($ro = mysqli_fetch_assoc($resultvi)) {
                            $documents = $ro['documents'];
                            $documentPaths = explode(',', $documents);
                            foreach ($documentPaths as $documentPath) {
                                $newFilePath = 'emp_doc/' . basename($documentPath);
                                if (copy($documentPath, $newFilePath)) {
                                    $insertQuery = "INSERT INTO emp_expe (emp_documents) VALUES ('$newFilePath')";
                                    mysqli_query($conn, $insertQuery);
                                } else {
                                    echo "Failed to copy the document: $documentPath";
                                }
                            }
                        }
                        ?> 
