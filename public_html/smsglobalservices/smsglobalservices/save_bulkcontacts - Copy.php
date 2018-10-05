<?php
    session_start();
    include_once "admin/ez_sql.php";
    $path = 'bulk_export/';
    $group=$_POST['group_id'];
    $fileOK = false;

    $cntTable = "contacts";
    
    // Will generate a new random filename so that if multiple users are uploading contacts,
    // it will not overwrite any file and will safely delete them when done.
    // recovering server disk space
    $newFilename = "contact_import_".time().".txt";

    // Temporarily Uploading the file to the server
    // The bulk_export Directory must be writable
    if (($_FILES["txtcontacts"]["type"] == "text/plain") && ($_FILES["txtcontacts"]["size"] < 20000)) {
        if ($_FILES["txtcontacts"]["error"] > 0) {
            $_SESSION['msg_ad']="<div class='act_msg'>".$_FILES["txtcontacts"]["error"]."</div>";
        }
        else {
            // Contacts Upload Here
            if(move_uploaded_file($_FILES["txtcontacts"]["tmp_name"], $path.$newFilename))
                $fileOK = true;
        }
    }
    else {
        $_SESSION['msg_ad']="<div class='act_msg'>Invalid File</div>";
    }

    // Processing the Uploaded file
    // =============================
    // We will allow only UNIQUE contact numbers from the file
    $numArray = file($path.$newFilename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $numArray = array_unique($numArray);

    // Deleting the file
    unlink($path.$newFilename);

    // Title FNAME LNAME Mobile(23480)
    foreach($numArray as $number) {
        // Valid TXT file for import would only contain
        // 1 columns as phone_number
        $q="insert into ".$cntTable." (contact_id, cus_title, name, phone, group_id,cus_id) values(".$nextid.",'','','','".$number."',".$group.",".$_SESSION['cus_id'].")";
        $db->query($q);
        $nextid++;
    }

    $_SESSION['msg_ad']="<div class='act_msg'>Contacts imported successfully</div>";
    header("Location:contacts.php");
?>