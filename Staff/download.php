<?php
// include "../Nisit/resource/navStaff.php";

$_REQUEST['file_name'];

// $file = 'monkey.gif';
$file = $_REQUEST['file_name'];

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}else{
    echo("<h1>นิสิตยังไม่ได้อัปโหลดไฟลนี้");
}
?>