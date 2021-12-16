<?php

$where = $_REQUEST['where'];
$which = $_REQUEST['which'];

$id = $_REQUEST['id'];
$tunname = $_REQUEST['tunname'];
$stats = $_REQUEST['stats'];
$table = $_REQUEST['table'];

include '../connectDb.php';
if($stats == "false"){
        $stats="";
}

// if($which = 'status'){

// }elseif($which = 'status2'){

// }else{

// }

$sql = "UPDATE $tunname
        SET $which='$stats'
        WHERE id=$id ";
print_r($sql);
$result = $conn->query($sql);
header("Location: http://localhost/Intern/staff/$where.php?table=$table&which=$which");