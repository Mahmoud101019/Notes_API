<?php
include_once "connect.php";

$stmt=$con->prepare("UPDATE `users` SET username = 'hossamd', email = 'hossamd@gmail.com' WHERE id = 2");

$stmt->execute();

$count = $stmt->rowCount();

if ($count >0) {
     # code...
     echo "Success";
}
else{
     echo "Fail";
}
// $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// echo json_encode($users);
// echo "<pre>";

?>