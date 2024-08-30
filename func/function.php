<?php
   define("MB" , 1048576);
     function filterRequest($requestname){
        return  htmlspecialchars(strip_tags($_POST[$requestname]));
     }



     function imageUpload($imagerequest){
      global $msgError;
      $imagename = $_FILES[$imagerequest]['name'];
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
         move_uploaded_file($imagetmp,"upload/" . $imagename);
      }else{
         print_r($msgError);
      }
     }

?>