        
<?php
include 'db.php';
include 'user.php';
require_once('dohr.php');

        if (isset($_POST['apply'])) {
            $experience = $_POST['experience'];
            $previousSalary = $_POST['previousSalary'];
            $expectedSalary = $_POST['expectedSalary'];
            $dp_name = $_FILES['resume']['name'];
            $dp_tmp_path = $_FILES['resume']['tmp_name'];
            $dp_storage_path1 = "user_resume/" . $dp_name;
            move_uploaded_file($dp_tmp_path, $dp_storage_path1);
            $status = $_POST['status'];
            $noticePeriod = $_POST['noticePeriod'];
            $userid = $_POST['usid'];
            $notiid = $_POST['noid'];
            $user=new User($conn);
            $user->insertapplication($userid, $notiid, $experience, $previousSalary, $expectedSalary, $dp_storage_path1, $status, $noticePeriod);
        }
    


        if (isset($_POST['expedoup'])) {

        $euserid = $_POST['euserid'];
        $send = $_POST['send'];

        for ($i = 0; $i < count($_FILES['experienceCertificate']['name']); $i++) {
            $doc_name = $_FILES['experienceCertificate']['name'][$i];
            $doc_tmp_path = $_FILES['experienceCertificate']['tmp_name'][$i];
            $doc_storage_path = "verifi_document/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $doc_storage_path);
            
            $joid = $_POST['joid'];

            $dohr = new Hr($conn);
            $upexdoc = $dohr->upexdoc($doc_storage_path, $euserid, $joid, $send);
        }
    }



        if (isset($_POST['subveridoc'])) {
            $vfirstName = $_POST['vfirstName'];
            $vlastName = $_POST['vlastName'];
            $vemail = $_POST['vemail'];
            $vprimaryNumber = $_POST['vprimaryNumber'];
            $vsecondaryNumber = $_POST['vsecondaryNumber'];
            $vbloodGroup = $_POST['vbloodGroup'];


        // $v10thMarksheet = $_POST['v10thMarksheet'];
            $doc_name = $_FILES['v10thMarksheet']['name'];
            $doc_tmp_path = $_FILES['v10thMarksheet']['tmp_name'];
            $doc_storage_path10 = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $doc_storage_path10);

            // $v12thMarksheet = $_POST['v12thMarksheet'];
            $doc_name = $_FILES['v12thMarksheet']['name'];
            $doc_tmp_path = $_FILES['v12thMarksheet']['tmp_name'];
            $doc_storage_path12 = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $doc_storage_path12);

            // $vugCertificate = $_POST['vugCertificate'];
            $doc_name = $_FILES['vugCertificate']['name'];
            $doc_tmp_path = $_FILES['vugCertificate']['tmp_name'];
            $doc_storage_pathug = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $doc_storage_pathug);

            // $vpgCertificate = $_POST['vugCertificate'];
            $doc_name = $_FILES['vugCertificate']['name'];
            $doc_tmp_path = $_FILES['vugCertificate']['tmp_name'];
            $doc_storage_pathpg = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $doc_storage_pathpg);

            // $vaadharCard = $_POST['vaadharCard'];
            $doc_name = $_FILES['vaadharCard']['name'];
            $doc_tmp_path = $_FILES['vaadharCard']['tmp_name'];
            $doc_storage_pathpgaa = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $doc_storage_pathpgaa);

            // $vpanCard = $_POST['vpanCard'];
            $doc_name = $_FILES['vpanCard']['name'];
            $doc_tmp_path = $_FILES['vpanCard']['tmp_name'];
            $doc_storage_pathpan = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $doc_storage_pathpan);

            $photo_name = $_FILES['vphoto']['name'];
            $photo_tmp_path = $_FILES['vphoto']['tmp_name'];
            $doc_storage_pathph = "verifi_photos/" . $photo_name;
            move_uploaded_file($photo_tmp_path, $doc_storage_pathph);

            $signature_name = $_FILES['vsignature']['name'];
            $signature_tmp_path = $_FILES['vsignature']['tmp_name'];
            $doc_storage_pathsi = "verifi_photos/" . $signature_name;
            move_uploaded_file($signature_tmp_path, $doc_storage_pathsi);

            $certistatus = $_POST['certistatus'];
            $euserid1 = $_POST['euserid1'];

            $dohr = new Hr($conn);
            $upexdocin = $dohr->upexdocin($euserid1, $vfirstName, $vlastName, $vemail, $vprimaryNumber, $vsecondaryNumber, $doc_storage_path10, $doc_storage_path12, $doc_storage_pathug, $doc_storage_pathpg, $doc_storage_pathpgaa, $doc_storage_pathpan, $vbloodGroup, $doc_storage_pathph, $doc_storage_pathsi, $certistatus);
        }


        if (isset($_POST['selexpvercer'])) {
            $uscerverid = $_POST['uscerverid'];
            $dohr = new Hr($conn);
            $dohr->uscerverid($uscerverid);
        }

         if (isset($_POST['veristatussub'])) {
            $verifidocid = $_POST['verifidocid'];
            $versatusup = $_POST['veristau'];
            $dohr = new Hr($conn);
            $dohr->uscerveridup($verifidocid, $versatusup);
        }


        if (isset($_POST['fns'])) {
            $input = $_POST['upname']; 
            $joinid = $_POST['fnid'];
            $column = $_POST['f_n'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }


        if (isset($_POST['lns'])) {
            $input = $_POST['upnamel']; 
            $joinid = $_POST['fnid'];
            $column = $_POST['l_n'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }

        if (isset($_POST['emails'])) {
            $input = $_POST['upemail']; 
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }



        if (isset($_POST['pri'])) {
            $input = $_POST['uppri']; 
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }

        if (isset($_POST['sec'])) {
            $input = $_POST['upsec']; 
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }

        if (isset($_POST['blo'])) {
            $input = $_POST['upblo']; 
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }


         if (isset($_POST['10'])) {
            $doc_name = $_FILES['up10']['name'];
            $doc_tmp_path = $_FILES['up10']['tmp_name'];
            $input = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }


         if (isset($_POST['12'])) {
            $doc_name = $_FILES['up12']['name'];
            $doc_tmp_path = $_FILES['up12']['tmp_name'];
            $input = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }


        if (isset($_POST['ug'])) {
            $doc_name = $_FILES['upug']['name'];
            $doc_tmp_path = $_FILES['upug']['tmp_name'];
            $input = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }

        if (isset($_POST['pg'])) {
            $doc_name = $_FILES['uppg']['name'];
            $doc_tmp_path = $_FILES['uppg']['tmp_name'];
            $input = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }

        if (isset($_POST['aa'])) {
            $doc_name = $_FILES['upaa']['name'];
            $doc_tmp_path = $_FILES['upaa']['tmp_name'];
            $input = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }

        if (isset($_POST['pa'])) {
            $doc_name = $_FILES['uppa']['name'];
            $doc_tmp_path = $_FILES['uppa']['tmp_name'];
            $input = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }

        if (isset($_POST['ph'])) {
            $doc_name = $_FILES['upph']['name'];
            $doc_tmp_path = $_FILES['upph']['tmp_name'];
            $input = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }

        if (isset($_POST['si'])) {
            $doc_name = $_FILES['upsi']['name'];
            $doc_tmp_path = $_FILES['upsi']['tmp_name'];
            $input = "verifi_others/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['fnid'];
            $column = $_POST['db'];
            $dohr = new Hr($conn);
            $dohr->editall($input, $joinid, $column);
        }

       if (isset($_POST['expdocedit'])) {
            $ejoin_ids = $_POST['ejoin_ids'];

            $doc_name = $_FILES['editexdoc']['name'];
            $doc_tmp_path = $_FILES['editexdoc']['tmp_name'];
            $editexdoc = "verifi_document/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $editexdoc);

            $dohr = new Hr($conn);
            $dohr->editexpall($ejoin_ids, $editexdoc);
        }

        if (isset($_POST['remcan'])) {
            $joinidd = $_POST['joinidd'];
            $dohr = new Hr($conn);
            $dohr->delcandi($joinidd);   
        }

    if (isset($_POST['empadd'])) {
    $epass = $_POST['epass'];
    $euserid = $_POST['euserid'];
    $ejoinid = $_POST['ejoinid'];
    $efn = $_POST['efn'];
    $eln = $_POST['eln'];
    $eemail = $_POST['eemail'];
    $epn = $_POST['epn'];
    $esn = $_POST['esn'];
    $eblood = $_POST['eblood'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $graduation_year = $_POST['graduation_year'];
    $t10th_mark_sheet = $_POST['t10th_mark_sheet'];
    $t12th_mark_sheet = $_POST['t12th_mark_sheet'];
    $ug_certificate = $_POST['ug_certificate'];
    $pg_certificate = $_POST['pg_certificate'];
    $aadhar_card = $_POST['aadhar_card'];
    $pan_card = $_POST['pan_card'];
    $photo = $_POST['photo'];
    $signature = $_POST['signature'];
    $vuser_id = $_POST['vuser_id'];

    $exdoc = $_POST['exdoc'];
    $exdocPaths = explode(',', $exdoc);

    $dohr = new Hr($conn);
    $dohr->empinsert($epass, $euserid, $ejoinid, $efn, $eln, $eemail, $epn, $esn, $eblood, $dob, $gender, $graduation_year,
        $t10th_mark_sheet, $t12th_mark_sheet, $ug_certificate, $pg_certificate, $aadhar_card, $pan_card, $photo,
        $signature, $vuser_id, $exdocPaths);

}

    if (isset($_POST['cpass1'])) {
            $input = $_POST['cpass']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }


        if (isset($_POST['cfn1'])) {
            $input = $_POST['cfn']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }


        if (isset($_POST['cln1'])) {
            $input = $_POST['cln']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }


        if (isset($_POST['cemail1'])) {
            $input = $_POST['cemail']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['cpri1'])) {
            $input = $_POST['cpri']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['csec1'])) {
            $input = $_POST['csec']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['cbl1'])) {
            $input = $_POST['cbl']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['cdob1'])) {
            $input = $_POST['cdob']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['cgen1'])) {
            $input = $_POST['cgen']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['cyear1'])) {
            $input = $_POST['cyear']; 
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['c101'])) {
            $doc_name = $_FILES['c10']['name'];
            $doc_tmp_path = $_FILES['c10']['tmp_name'];
            $input = "emp_doc/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['c121'])) {
            $doc_name = $_FILES['c12']['name'];
            $doc_tmp_path = $_FILES['c12']['tmp_name'];
            $input = "emp_doc/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['cug1'])) {
            $doc_name = $_FILES['cug']['name'];
            $doc_tmp_path = $_FILES['cug']['tmp_name'];
            $input = "emp_doc/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['cpg1'])) {
            $doc_name = $_FILES['cpg']['name'];
            $doc_tmp_path = $_FILES['cpg']['tmp_name'];
            $input = "emp_doc/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['caa1'])) {
            $doc_name = $_FILES['caa']['name'];
            $doc_tmp_path = $_FILES['caa']['tmp_name'];
            $input = "emp_doc/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['cpan1'])) {
            $doc_name = $_FILES['cpan']['name'];
            $doc_tmp_path = $_FILES['cpan']['tmp_name'];
            $input = "emp_doc/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['cpho1'])) {
            $doc_name = $_FILES['cpho']['name'];
            $doc_tmp_path = $_FILES['cpho']['tmp_name'];
            $input = "emp_doc/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }

        if (isset($_POST['csin1'])) {
            $doc_name = $_FILES['csin']['name'];
            $doc_tmp_path = $_FILES['csin']['tmp_name'];
            $input = "emp_doc/" . $doc_name;
            move_uploaded_file($doc_tmp_path, $input);
            $joinid = $_POST['empid'];
            $column = $_POST['emptable'];
            $dohr = new Hr($conn);
            $dohr->empedit($input, $joinid, $column);
        }


        if (isset($_POST['emps'])) {
            $empids = $_POST['empids'];
            $dohr = new Hr($conn);
            $dohr->delemp($empids);
        }

?>