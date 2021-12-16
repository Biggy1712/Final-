<!DOCTYPE html>
<html lang="en">
<?php
session_start();
ob_start();
if ($_SESSION['login'] != "true") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: http://localhost/intern/nisit/loginNisit.php");
    session_destroy();
}
include "../connectDb.php";
include "../Nisit/resource/nav.php";

// $user = $_SESSION['user'];
// print_r($_SESSION);
?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .centerimages {
            margin-left: 30%;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div>
        <table id="myTable" class="display" style="width:90%;text-align:center;margin-left:auto;margin-right:auto;  border-collapse: collapse;  border: 1px solid black; ">
            <?php
            $user = $_SESSION['user'];
            echo ('
             <tr>
                 <th>user</th>
                 <th>ชื่อทุนที่ลงทำเบียน</th>
                 <th>วันลงทะเบียน</th>
                 <th>ไฟล์ที่อัปโหลด</th>
                 <th>ผลสอบสัมภาษณ์</th>
                 <th>ผลการคัดเลือก</th>

             </tr>');

            //-----------------------------
            $sql = "SELECT * FROM work where user='$user' ";
            $result = $conn->query($sql);
            // print_r($result);
            $master = [];
            $secArr = [];
            $userarr = array();
            $userarrsub = array();
            $userarrsubmore = array();
            while ($row = $result->fetch_assoc()) {

                //----add

                //-----add 
                // print_r($results);

                echo "<tr>";
                echo "<th><a href='http://localhost/Intern/show.php?tunname=work&id= " . $row['id'] . " &user=" . $row['user'] . "&time=" . $row['time'] . "'>" . $row['user'] . "</a></th>";

                echo "<th>ทุนช่วยงาน</th>";
                echo "<th>" . gmdate("d-m-Y", $row['time']) . "</th>";
                if ($row['status']) {
                    echo "<th style='color:green'><strong>ผ่านการประเมิน</strong></th>";
                } else {
                    echo "<th>รอการประเมิน</th>";
                }
                if ($row['status2']) {
                    echo "<th style='color:green'><strong>ผ่านสัมภาษณ์ </strong></th>";
                } elseif ($row['status4']) {
                    echo "<th style='color:orange'>ไม่ผ่านสอบสัมพาส</th>";
                } else {
                    echo "<th style='color:red'>ไม่ผ่านพิจารณา</th>";
                }
                if ($row['status3']) {
                    echo "<th style='color:green'><strong>ผ่านการคัดเลือก</strong></th>";
                } else {
                    echo "<th style='color:red'>ไม่ผ่านการคัดเลือก</th>";
                }
                // $sqls = "SELECT * FROM work where user = '".$row['user']."' and status2 = 'true'";
                // $results = $conn->query($sqls);
                // echo('<pre>');
                // while($rows = $results->fetch_assoc()){
                //     // print_r($rows); 
                // }
                echo "</tr>";
            }
            //-----------------------------
            $sql = "SELECT * FROM emergency where user='$user' ";
            $result = $conn->query($sql);
            // print_r($result);
            $master = [];
            $secArr = [];
            $userarr = array();
            $userarrsub = array();
            $userarrsubmore = array();
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th><a href='http://localhost/Intern/show.php?tunname=emergency&id= " . $row['id'] . " &user=" . $row['user'] . "&time=" . $row['time'] . "'>" . $row['user'] . "</a></th>";

                echo "<th>ทุนฉุกเฉิน</th>";
                echo "<th>" . gmdate("d-m-Y", $row['time']) . "</th>";
                if ($row['status']) {
                    echo "<th style='color:green'><strong>ผ่านการประเมิน</strong></th>";
                } else {
                    echo "<th>รอการประเมิน</th>";
                }
                if ($row['status2']) {
                    echo "<th style='color:green'><strong>ผ่านการสอบสัมภาษณ์ </strong></th>";
                } elseif ($row['status4']) {
                    echo "<th style='color:orange'>ไม่ผ่านการสอบสัมภาษณ์</th>";
                } else {
                    echo "<th style='color:red'>ไม่ผ่านการสอบสัมภาษณ์</th>";
                }
                if ($row['status3']) {
                    echo "<th style='color:green'><strong>ผ่านการคัดเลือก</strong></th>";
                } else {
                    echo "<th style='color:red'>ไม่ผ่านการคัดเลือก</th>";
                }
                echo "</tr>";
            }
            //------------------------------
            $sql = "SELECT * FROM tunasup where user='$user' ";
            $result = $conn->query($sql);
            // print_r($result);
            $master = [];
            $secArr = [];
            $userarr = array();
            $userarrsub = array();
            $userarrsubmore = array();
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th><a href='http://localhost/Intern/show.php?tunname=tunasup&id= " . $row['id'] . " &user=" . $row['user'] . "&time=" . $row['time'] . "'>" . $row['user'] . "</a></th>";

                echo "<th>ทุนขาดแคลน</th>";
                echo "<th>" . gmdate("d-m-Y", $row['time']) . "</th>";
                if ($row['status']) {
                    echo "<th style='color:green'><strong>ผ่านการประเมิน</strong></th>";
                } else {
                    echo "<th>รอการประเมิน</th>";
                }
                if ($row['status2']) {
                    echo "<th style='color:green'><strong>ผ่านสอบสัมภาษณ์ </strong></th>";
                } elseif ($row['status4']) {
                    echo "<th style='color:orange'>ไม่ผ่านการสอบสัมภาษณ์</th>";
                } else {
                    echo "<th style='color:red'>ไม่ผ่านการสอบสัมภาษณ์</th>";
                }
                if ($row['status3']) {
                    echo "<th style='color:green'><strong>ผ่านการคัดเลือก</strong></th>";
                } else {
                    echo "<th style='color:red'>ไม่ผ่านการคัดเลือก</th>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>