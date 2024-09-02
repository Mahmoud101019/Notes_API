<?php

     include_once "../connect.php";

     $notes_id = filterRequest("notes_id") ;
     $imagename = filterRequest("notes_image");


     $stmt = $con->prepare("DELETE FROM `notes` WHERE notes_id = ?");

     $stmt->execute(array($notes_id));

     $count = $stmt->rowCount();

     if ($count>0) {
          # code...
          deletefile("../upload" , $imagename);
          echo json_encode(array("status"=>"Success"));
     }else{
          echo json_encode(array("status"=>"Fail"));
     }
?>