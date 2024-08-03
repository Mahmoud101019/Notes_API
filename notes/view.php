<?php 

include_once "../connect.php";

$notes_user   = filterRequest("notes_user");

$stmt = $con->prepare("SELECT * FROM `notes` WHERE notes_user = ?");

$stmt->execute(array($notes_user));

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count = $stmt->rowCount();

if ($count>0) {
     # code...
     echo json_encode(array("status"=>"Success", "data" => $data));
}else{
     echo json_encode(array("status"=>"Fail"));
}
?>

