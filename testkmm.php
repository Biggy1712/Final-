<?php
session_start();
ob_start();
header('Content-Type: text/html; charset=utf-8');
ini_set('max_execution_time', 300);
set_time_limit(300);


// เช็คขอมูลว่าระหว่างทางข้อมูลยังอยู้ดีรึเปล่า
// if ($_REQUEST['Id'] == null) {
//     Session_Logout();
// }
// if ($_REQUEST['Password'] == null) {
//     Session_Logout();
// }

//decode ข้อมูล
// $_REQUEST['Id'] = base64_decode($_REQUEST['Id']);
// $_REQUEST['Password'] = base64_decode($_REQUEST['Password']);

//เก็บค่า
// $Id = $_REQUEST['Id'];
// $Password = $_REQUEST['Password'];

//configDb
$Db_Servername = 'webkm';
$Db_Username = 'root';
$Db_Password = 'dbwebkm@2016';
$Db_name = 'webkm';



$conn = mysqli_connect($Db_Servername, $Db_Username, $Db_Password, $Db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//เทียบid&pass
$sql = "SELECT EMP_USERNAME,EMP_PASSWORD,SKILL FROM vw_employee_webkm Where EMP_USERNAME='7599650' ";
$result = mysqli_query($conn, $sql);

//หาskill
$sqlSk = " SELECT SKILL FROM vw_employee_webkm WHERE EMP_USERNAME='" . $Id . "' and EMP_PASSWORD='" . $Password . "' ";
$resultSk = mysqli_query($conn, $sqlSk);


if (mysqli_num_rows($result) == 1) {
    if (mysqli_num_rows($resultSk) == 1) {
        if (mysqli_num_rows($resultSk) > 0) {
            while ($rowSk = mysqli_fetch_assoc($resultSk)) {
                $RessSk[] = array(

                    //ถ้าอยากจะเช็คข้อมูลเพิ่มก็เพิ่มได้เลยตามตัวอย่างข้างล่าง ฝั่งซ้ายจะเป็นชื่อที่ตั้งเองแล้วก็จะเป็นชื่อkeyที่จะใช้ในการเรียกทีหลัง
                    // 'emp_code' => $row['EMP_CODE'],
                    'skills'   => $rowSk['SKILL'],
                );
            }
        }
        $Skill_Num = ($RessSk[0]['skills']);
        $_SESSION['skill_sent'] = ($RessSk[0]['skills']);
        if ($Skill_Num !== null) {
            $Skill_Num = json_encode($Skill_Num);

            //ส่งค่าjsonกลับไปหน้าlogin
            echo $Skill_Num;
            return $Skill_Num;
        }
    }
} else {
    mysqli_close($conn);
}

function Session_Logout() // ยกเลิก session ทั้งหมดและส่งกลับหน้า login
{
    unset($_SESSION["luser"]);
    unset($_SESSION["start"]);
    unset($_SESSION["expire"]);
    unset($_SESSION["skill_sent"]);
    session_destroy();
    header("Location: https://callservicechat.gosoft.co.th/KMSearch/front/login_front.php");
}
