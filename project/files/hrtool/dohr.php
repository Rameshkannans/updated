<?php
class Hr {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function notifiinsert($jobtitle, $openings, $descreption, $experience, $noofexper, $Location, $appstartdate,$appenddate) {
        $insert_value = "INSERT INTO job_notifi (job_title, openings, description, experience,no_of_exp, location, app_start_date, app_end_date)
        VALUES ('$jobtitle', '$openings','$descreption', '$experience', '$noofexper', '$Location', '$appstartdate','$appenddate')";
        $connect = $this->conn->query($insert_value); 
    }

    public function hrtable() {
        $select_value1 = "SELECT * FROM job_notifi";
        $hrsel1 = mysqli_query($this->conn, $select_value1);
        return $hrsel1;
    }

        public function deljobss($deljob) {
            $delsqljob = "DELETE FROM job_notifi WHERE job_noti_id ='$deljob'";
            $deljob = $this->conn->query($delsqljob);
            if ($deljob) {
                return true;
            } else {
                return false;
            }
        }

           public function editjobss($jobtitle1, $openings1, $descreption1, $experience1, $noofexper1, $Location1, $appstartdate1, $appenddate1, $deljobid) {
                $upsql = "UPDATE job_notifi SET 
                                job_title='$jobtitle1', 
                                openings='$openings1', 
                                description='$descreption1', 
                                experience='$experience1', 
                                no_of_exp='$noofexper1', 
                                location='$Location1',
                                app_start_date='$appstartdate1',
                                app_end_date='$appenddate1' 
                                WHERE job_noti_id='$deljobid'";

                if ($aa = mysqli_query($this->conn, $upsql) === TRUE) {
                    header('Location: jobnotitable.php');
                } else {
                    echo "Error updating database: " . $this->conn->error;
                }
            }

    public function apptable() {
        $select_value1 = "SELECT * FROM app_table";
        $hrsel2 = mysqli_query($this->conn, $select_value1);
        return $hrsel2;
    }

    public function statusupdate($statusup,$applie){
        $upsqls = "UPDATE app_table SET 
            astatus='$statusup' 
            WHERE app_id ='$applie'";
            if ($stup = mysqli_query($this->conn, $upsqls) === TRUE) {
                    header('Location: applications.php');
                } else {
                    echo "Error updating database: " . $this->conn->error;
                }
    }


            public function delapps($delapp) {
            $delsqlapp = "DELETE FROM app_table WHERE app_id ='$delapp'";
            $delappi = $this->conn->query($delsqlapp);
            if ($delappi) {
                return true;
            } else {
                return false;
            }
        }


        public function upexdoc($doc_storage_path, $euserid, $joid, $send) {
            $insert_valueex = "INSERT INTO expe_doc (euser_id, documents, ejoin_id) VALUES ('$euserid', '$doc_storage_path', '$joid')";
            $connectex = $this->conn->query($insert_valueex);

            $upsta = "UPDATE app_table SET astatus = '$send' WHERE auser_id = '$euserid'";
            $ups = mysqli_query($this->conn, $upsta);

            if ($connectex) {
                header("Location: dahboard.php");
            } else {
                return false;
            }
        }


        public function upexdocin($euserid1,$vfirstName,$vlastName,$vemail,$vprimaryNumber,$vsecondaryNumber,$doc_storage_path10,$doc_storage_path12,$doc_storage_pathug,$doc_storage_pathpg,$doc_storage_pathpgaa,$doc_storage_pathpan,$vbloodGroup,$doc_storage_pathph,$doc_storage_pathsi,$certistatus) {
        $insert_valueot = "INSERT INTO join_table (vuser_id, first_name, last_name, vemail,primary_number, secondary_number, 10th_mark_sheet, 12th_mark_sheet,ug_certificate,pg_certificate,aadhar_card,pan_card,blood_group,photo,signature,versatus)
            VALUES ('$euserid1','$vfirstName','$vlastName','$vemail','$vprimaryNumber','$vsecondaryNumber','$doc_storage_path10','$doc_storage_path12','$doc_storage_pathug','$doc_storage_pathpg','$doc_storage_pathpgaa','$doc_storage_pathpan','$vbloodGroup','$doc_storage_pathph','$doc_storage_pathsi','$certistatus')";
        $connectot = $this->conn->query($insert_valueot); 
        if ($connectot) {
            header("Location:expdocup.php");
        }
        else{
            return false;
        }
    }

    public function selverification() {
        $select_value2 = "SELECT * FROM join_table";
        $selver = mysqli_query($this->conn, $select_value2);
        return $selver;
    }


    public function uscerverid($uscerverid) {
            $select_value3 = "SELECT * FROM expe_doc WHERE euser_id = '$uscerverid'";
            $selverex = mysqli_query($this->conn, $select_value3);
            return $selverex;
        }

    public function uscerveridup($verifidocid, $versatusup) {
    $upversta = "UPDATE join_table SET versatus='$versatusup' WHERE joining_id ='$verifidocid'";
        
        if ($this->conn->query($upversta)) {
            header('Location: cerveri.php');
            exit();  
        } else {
            echo "Error updating database: " . $this->conn->error;
        }
    }


    public function viewvericheck($user_ids)
        {
            $viewveri = "SELECT * FROM  join_table WHERE vuser_id = '$user_ids'";
            $viewveriup = mysqli_query($this->conn, $viewveri);
            return $viewveriup;
        }

        public function hrviewvericheck($joinstatu)
        {
            $hrviewveri = "SELECT * FROM  join_table WHERE joining_id  = '$joinstatu'";
            $hrviewveriup = mysqli_query($this->conn, $hrviewveri);
            return $hrviewveriup;
        }



        public function candviewid($canviewjoinid) {
            $select_val = "SELECT * FROM expe_doc WHERE ejoin_id = '$canviewjoinid'";
            $selvere = mysqli_query($this->conn, $select_val);
            return $selvere;
        }


        public function editall($input, $joinid, $column) {
            $edits = "UPDATE join_table SET $column ='$input' WHERE joining_id ='$joinid'";
                if ($this->conn->query($edits)) {
                    header('Location: dahboard.php');
                    exit();  
                } else {
                    echo "Error updating database: " . $this->conn->error;
                }
            }


        public function editvericheck($edjoid)
            {
                $editveri = "SELECT * FROM  join_table WHERE joining_id  = '$edjoid'";
                $editverifi = mysqli_query($this->conn, $editveri);
                return $editverifi;
            }


       public function seljoinid($user_id)
        {
            $seljoin = "SELECT * FROM join_table WHERE vuser_id = '$user_id' ORDER BY joining_id DESC LIMIT 1";
            $seljoins = mysqli_query($this->conn, $seljoin);
            if ($seljoins) {
                return $seljoins;
            } else {
                echo "Error: " . $seljoin . "<br>" . mysqli_error($this->conn);
                return false;
            }
        } 

        public function editexpall($ejoin_ids, $editexdoc) {
            $editexdoc = $this->conn->real_escape_string($editexdoc); 

            $sql = "UPDATE expe_doc SET documents = '$editexdoc' WHERE expe_id  = '$ejoin_ids'";

            if ($this->conn->query($sql)) {
                header('Location: dahboard.php');
                exit();
            } else {
                echo "Error updating database: " . $this->conn->error;
            }
        }

        public function delcandi($joinidd){

                $deca = "DELETE FROM join_table WHERE joining_id ='$joinidd'";
                $decan = $this->conn->query($deca);
                if ($decan) {
                    header("Location:cerveri.php");
                } else {
                    return false;
                }
            }
        
    public function chus($usidd) {
        $select_v = "SELECT * FROM user_reg WHERE user_id = $usidd";
        $selus = $this->conn->query($select_v);

        if ($selus && $selus->num_rows == 1) {
            return $selus->fetch_assoc();
        } else {
            return false;
        }
    }


    public function selstaus($uid) {
        $select_s = "SELECT * FROM app_table WHERE auser_id = $uid";
        $selust = $this->conn->query($select_s);

        if ($selust) {
            return $selust->fetch_assoc();
        } else {
            return false;
        }
    }

    public function uscerverids($ussid){
      $select_ss = "SELECT * FROM user_reg WHERE user_id = $ussid";
        $selustt = $this->conn->query($select_ss);

        if ($selustt) {
            return $selustt->fetch_assoc();
        } else {
            return false;
        }
    }   

    public function empinsert($epass, $euserid, $ejoinid, $efn, $eln, $eemail, $epn, $esn, $eblood, $dob, $gender, $graduation_year,$t10th_mark_sheet, $t12th_mark_sheet, $ug_certificate, $pg_certificate, $aadhar_card, $pan_card, $photo,$signature, $vuser_id, $exdocPaths){

        $ten = 'emp_doc/'. basename($t10th_mark_sheet);
        copy($t10th_mark_sheet, $ten);

        $twe = 'emp_doc/'. basename($t12th_mark_sheet);
        copy($t12th_mark_sheet, $twe);

        $ug = 'emp_doc/'. basename($ug_certificate);
        copy($ug_certificate, $ug);

        $pg = 'emp_doc/'. basename($pg_certificate);
        copy($pg_certificate, $pg);

        $aath = 'emp_doc/'. basename($aadhar_card);
        copy($aadhar_card, $aath);

        $pan = 'emp_doc/'. basename($pan_card);
        copy($pan_card, $pan);

        $pho = 'emp_doc/'. basename($photo);
        copy($photo, $pho);

        $sig = 'emp_doc/'. basename($signature);
        copy($signature, $sig);


    $insert_emp = "INSERT INTO emp_table (pass, user_id, join_id, f_name, l_name, email, pri_number, sec_number, blood, dob, gender, graduation_year, 10th, 12th, ug, pg , aadhar , pan, photo ,sign, exp)
        VALUES ('$epass','$euserid','$ejoinid','$efn','$eln','$eemail','$epn','$esn','$eblood','$dob','$gender','$graduation_year','$ten','$twe','$ug','$pg','$aath','$pan','$pho','$sig','$vuser_id')";
            $connects = $this->conn->query($insert_emp);

            $select_emp = "SELECT * FROM emp_table WHERE join_id = '$ejoinid'";
            $select_employee = $this->conn->query($select_emp);

            if ($select_employee ) {
                $se = $select_employee->fetch_assoc();

                if ($connects) {
                    foreach ($exdocPaths as $documentPath) {
                        $newFilePath = 'emp_doc/' . basename($documentPath);
                        if (copy($documentPath, $newFilePath)) {
        
                            $empId = $se['emp_id'];

                            $insertQuery = "INSERT INTO emp_expe (join_id ,emp_id, emp_documents) VALUES ('$ejoinid','$empId', '$newFilePath')";
                            mysqli_query($this->conn, $insertQuery);
                        } else {
                            echo "Failed to copy the document: $documentPath";
                        }
                    }
                    header("Location: empdeatail.php");
                } else {
                    echo "Error inserting employee data.";
                }
            } else {
                echo "Error fetching employee data.";
            }

}




    public function selemployee(){
      $select_emp = "SELECT * FROM emp_table";
        $select_employee = $this->conn->query($select_emp);
            return $select_employee;
    } 


    public function empedit($input, $joinid, $column) {
            $editse = "UPDATE emp_table SET $column ='$input' WHERE emp_id  ='$joinid'";
                if ($this->conn->query($editse)) {
                    header('Location: empdeatail.php');
                    exit();  
                } else {
                    echo "Error updating database: " . $this->conn->error;
                }
            }


        public function delemp($empids){
            $delemp = "DELETE FROM emp_table WHERE emp_id  ='$empids'";
                $delemps = $this->conn->query($delemp);
                if ($delemps) {
                    header("Location:empdeatail.php");
                } else {
                    return false;
                }

            }



            public function empexpdoc($documentPaths){
            foreach ($documentPaths as $docPath) {
                                $insertQuery = "INSERT INTO emp_expe (emp_documents) VALUES ('$docPath')";
                                if (mysqli_query($conn, $insertQuery)) {
                                    echo "Document path inserted successfully: $docPath<br>";
                                } else {
                                    echo "Error: " . mysqli_error($conn) . "<br>";
                                }
                            }
        }


        public function seedochr($user_ids) {
        $select_edoc = "SELECT * FROM emp_expe WHERE emp_id = '$user_ids'";
        $selvere = mysqli_query($this->conn, $select_edoc);
            return $selvere;
        }


}

?>
