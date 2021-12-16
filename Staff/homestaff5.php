<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<?php
session_start();
ob_start();
if ($_SESSION['login2'] != "true") {
    header("Location: http://localhost/intern/Staff/login_staff.php");
    session_destroy();
}
include "../connectDb.php";
include "../Nisit/resource/navIndex.php";
error_reporting(0);
?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http:\\localhost\Intern\Nisit\resource\css.css">

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
            $count = 0;
            $count2 = 0;

            echo ('
                <tr>
                    <th>user</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชั้นปี</th>
                    <th>สาขา</th>
                    <th>เกรดเฉลี่ย</th>

                    <th>บัตรนิสิต</th>
                    <th>ผลการเรียน</th>
                    <th>ตารางเรียน</th>
                    <th>สมุดบัญชี</th>
                    <th class="header">ชื่ออาจารย์(user)</th>

                    <th class="header">ดูการประเมิน</th>
                    <th class="header">การเบิกเงิน</th>
                    
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;ตรวจสอบการประเมินผล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                </tr>
                ');

            $sql = "SELECT * FROM work where status5 = 'true' and status6 IS NULL ";
            $result = $conn->query($sql);

            $master = [];
            $secArr = [];
            $userarr = array();
            $userarrsub = array();
            $userarrsubmore = array();

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<th><a href='http://localhost/Intern/staff/clocktimestatus.php'>" . $row['user'] . "</a></th>";

                $user = $row['user'];
                $Dsql = "SELECT * FROM nisit where user = '$user' ";
                $resultUser = $conn->query($Dsql);
                $Fuser = $resultUser->fetch_assoc();

                echo ('<th>' . $Fuser['thainame'] . " " . $Fuser['thaisurname'] . '</th>');
                echo ('<th>' . $Fuser['year'] . '</th>');
                echo ('<th>' . $Fuser['sec'] . '</th>');

                $regis = explode("|", $Fuser['keep']);

                if ($regis[15]) {
                    echo ('<th>' . $regis[15] . '</th>');
                } else {
                    echo ('<th>รอข้อมูล</th>');
                }

                echo "<th><a href='http://localhost/Intern/staff/download.php?file_name=" . $row['nisitidcard_path'] . "'>download</a></th>";
                echo "<th><a href='http://localhost/Intern/staff/download.php?file_name=" . $row['gpa_path'] . "'>download</a></th>";
                echo "<th><a href='http://localhost/Intern/staff/download.php?file_name=" . $row['study_path'] . "'>download</a></th>";
                echo "<th><a href='http://localhost/Intern/staff/download.php?file_name=" . $row['bank_path'] . "'>download</a></th>";
                echo "<th>" . $row['teachername'] . "</th>";
                echo "<th><a href='http://localhost/Intern/staff/download.php?file_name=" . $row['evaluatepath'] . "'>download</a></th>";
                echo "<th><a href='http://localhost/Intern/staff/download.php?file_name=" . $row['moneypath'] . "'>download</a></th>";


                echo ("
                        <th> 
                            <a href='http://localhost/Intern/staff/updateStats.php?id=" . $row['id'] . "&where=homeStaff5&which=status6&tunname=work&stats=true'>
                                เบิกเงิน 
                                <img class='centerimages' src='http://localhost/Intern/Nisit/resource/yes.png'  width='25' height='25'>
                            </a>
                        </th>");


                echo "</tr>";
            }
            ?>
        </table>
        <script>
            const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

            const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
                v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
            )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

            // do the work...
            document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
                const table = th.closest('table');
                Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
                    .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
                    .forEach(tr => table.appendChild(tr));
            })));
        </script>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>