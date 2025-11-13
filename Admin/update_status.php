<?php
include "connection.php";

$id     = $_POST['id'];
$status = $_POST['status'];
$table  = $_POST['table'];

$new_status = ($status == 1 ? 0 : 1);

//  allowed table names
$allowedTables = ['organizers', 'sponsers'];

if(!in_array($table, $allowedTables)){
    echo 0;
    exit;
}

$query = "UPDATE $table SET status='$new_status' WHERE id='$id'";
$run = mysqli_query($conn, $query);

echo $run ? 1 : 0;

?>

