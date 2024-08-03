<?php

     include_once "../connect.php";

     $email    = filterRequest("email");
     $password = filterRequest("password");


     $stmt = $con->prepare("SELECT * FROM `users` WHERE password = ? AND email = ? ");

     $stmt->execute(array($password,$email));
     $data = $stmt->fetch(PDO::FETCH_ASSOC);
     $count = $stmt->rowCount();

     if ($count>0) {
          # code...

          echo json_encode(array("status"=>"Success", "data" => $data));
     }else{
          echo json_encode(array("status"=>"Fail"));
     }
?>