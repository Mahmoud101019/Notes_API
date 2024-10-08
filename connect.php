<?php
     $dsn= "mysql:host=localhost;dbname=notesapp";
     $user="root";
     $pass = "";
     $option=  array(
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
     );

     try {
          //code...connection
          $con = new PDO(
               $dsn,
               $user,
               $pass,
               $option
          ); 
          $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
          
          header("Access-Control-Allow-Origin: *");
          header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
          header("Access-Control-Allow-Methods: POST, OPTIONS , GET");

          include_once "func/function.php";

          checkAuthenticate();
     } catch (PDOException $e) {
          //throw $e;
          echo $e->getMessage();
     }


?>