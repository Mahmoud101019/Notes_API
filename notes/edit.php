<?php

     include_once "../connect.php";

     $notes_id     = filterRequest("notes_id");
     $notes_title   = filterRequest("notes_title") ;
     $notes_contant = filterRequest("notes_contant");

     $stmt = $con->prepare("UPDATE `notes` SET notes_title=?,notes_contant=? WHERE notes_id = ?");

     $stmt->execute(array($notes_title,$notes_contant,$notes_id));

     $count = $stmt->rowCount();

     if ($count>0) {
          # code...

          echo json_encode(array("status"=>"Success"));
     }else{
          echo json_encode(array("status"=>"Fail"));
     }
?>
