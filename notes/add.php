<?php

     include_once "../connect.php";


     $notes_title   = filterRequest("notes_title") ;
     $notes_contant = filterRequest("notes_contant");
     $notes_user    = filterRequest("notes_user") ;
     $imagename = imageUpload("notes_image");

     if ($imagename != "fail") {
         
     $stmt = $con->prepare("INSERT INTO `notes`(`notes_title`, `notes_contant`, `notes_user`, `notes_image`) VALUES (?,?,?,?)");


     $stmt->execute(array($notes_title,$notes_contant,$notes_user,$imagename));

     $count = $stmt->rowCount();

     if ($count>0) {
          # code...

          echo json_encode(array("status"=>"Success"));
     }else{
          echo json_encode(array("status"=>"Fail"));
     }
     }else{
          echo json_encode(array("status"=>"Fail"));
     }


?>