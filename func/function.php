<?php
   define("MB" , 1048576);
     function filterRequest($requestname){
        return  htmlspecialchars(strip_tags($_POST[$requestname]));
     }



     function imageUpload($imagerequest){
      global $msgError;
      $imagename =rand(1,1000000) . $_FILES[$imagerequest]['name'];
      $imagetmp = $_FILES[$imagerequest]['tmp_name'];
      $imagesize = $_FILES[$imagerequest]['size'];
      $allowtExt = array("jpg", "gif" ,"png" , "pdf" , "mp3");
      $strToArray = explode("." , $imagename);
      $ext = end($strToArray);
      $ext = strtolower($ext);
      if (!empty($imagename) && !in_array($ext , $allowtExt) ) {
         $msgError[]= "Ext";
      }
      if ($imagesize > 2 *MB) {
         $msgError[]= "Size";
      }
      if (empty($msgError)) {
         move_uploaded_file($imagetmp, "../upload/" . $imagename);
         return $imagename;
      }else{
         return "fail";
      }
     }


     function deletefile($dir , $imagename){
      if (file_exists($dir . "/" . $imagename)) {
         unlink($dir . "/" . $imagename);
      }

     }


     function checkAuthenticate(){
      if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
         if ($_SERVER['PHP_AUTH_USER'] != "mahmoud" ||  $_SERVER['PHP_AUTH_PW'] != "mahmoud123456"){
             header('WWW-Authenticate: Basic realm="My Realm"');
             header('HTTP/1.0 401 Unauthorized');
             echo 'Page Not Found';
             exit;
         }
     } else {
         exit;
     }
     
     }


?>