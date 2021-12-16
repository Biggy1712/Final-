<!DOCTYPE html>
<html lang="en">
<?php
session_start();
ob_start();
// if ($_SESSION['login2'] != "true") {
//     header("Location: http://localhost/intern/Staff/login_staff.php");
//     session_destroy();
// }
include "./connectDb.php";
include "./Nisit/resource/navIndex.php";

// $_REQUEST['table'];
$table = 'tunasup';

error_reporting(0);

if ($_REQUEST['table']) {
    $table = $_REQUEST['table'];
    // print_r($_REQUEST['table']);
}

// print_r($table);
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
        <div style="margin: auto;width: 50%;text-align: center;">
            <a href="http://localhost/Intern/result.php?table=tunasup">| ทุนขาดแคลนทุนทรัพย์ |</a>
            <a href="http://localhost/Intern/result.php?table=work"> ทุนช่วยงาน |</a>
            <a href="http://localhost/Intern/result.php?table=emergency"> ทุนฉุกเฉิน |</a>

        </div>
        <br>
        <hr>
        <br>
        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> -->

        <?php
        if ($table == 'work') {
            echo ("<p style='text-align: center'>ทุนช่วยงาน</p><br>");
        } elseif ($table == 'tunasup') {
            echo ("<p style='text-align: center'>ทุนขาดแคลนทุนทรัพย์</p><br>");
        } elseif ($table == 'emergency') {
            echo ("<p style='text-align: center'>ทุนฉุกเฉิน</p><br>");
        }
        ?>
        <table id="myTable" class="display" style="width:90%;text-align:center;margin-left:auto;margin-right:auto;  border-collapse: collapse;  border: 1px solid black; ">
            <?php
            $count = 0;
            $count2 = 0;
            if ($table == 'tunasup') {
                echo ('
                <tr>
                    <th class="header">user</th>
                    <th class="header">ชื่อ-นามสกุล</th>
                    <th class="header">ชั้นปี</th>
                    <th class="header">สาขา</th>
                    <th class="header">เกรดเฉลี่ย</th>

                 
                   
                    
                    <th>สถานะการคัดเลือก</th>
                </tr>');
            } elseif ($table == 'work') {
                echo ('
                <tr>
                    <th>user</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชั้นปี</th>
                    <th>สาขา</th>
                    <th>เกรดเฉลี่ย</th>

                    
                    <th>สถานะการคัดเลือก</th>
                </tr>
                ');
            } elseif ($table == 'emergency') {
                echo ('
                <tr>
                    <th>user</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชั้นปี</th>
                    <th>สาขา</th>
                    <th>เกรดเฉลี่ย</th>
                    
                    
                    <th>สถานะการคัดเลือก</th>
                </tr>
                ');
            }
            // echo ($table);
            $sql = "SELECT * FROM $table where status2 = 'true' order by user ";
            $result = $conn->query($sql);
            // error_reporting(0);
            $master = [];
            $secArr = [];
            $userarr = array();
            $userarrsub = array();
            $userarrsubmore = array();

            while ($row = $result->fetch_assoc()) {

                // echo ("<pre>");
                // print_r($row);
                echo "<tr>";

                if ($table == 'work') {
                    // print_r($row);
                    echo "<th><a href='http://localhost/Intern/show.php?tunname=work&id= " . $row['id'] . " &user=" . $row['user'] . "&time=" . $row['time'] . "'>" . $row['user'] . "</a></th>";

                    $user = $row['user'];
                    $Dsql = "SELECT * FROM nisit  ";
                    $resultUser = $conn->query($Dsql);
                    $Fuser = $resultUser->fetch_assoc();

                    // echo ("<pre>");echo ("<pre>");
                    // print_r($Fuser);
                    echo ('<th>' . $Fuser['thainame'] . " " . $Fuser['thaisurname'] . '</th>');
                    echo ('<th>' . $Fuser['year'] . '</th>');
                    echo ('<th>' . $Fuser['sec'] . '</th>');


                    $regis = explode("|", $Fuser['keep']);
                    // 
                    // print_r($regis);

                    if ($regis[15]) {
                        echo ('<th>' . $regis[15] . '</th>');
                    } else {
                        echo ('<th>รอข้อมูล</th>');
                    }
                    // echo('<th>เกรด</th>');



                    if ($row['status']) {
                        echo "<th> รอสอบสัมภาษณ์<img class='centerimages' src='http://localhost/Intern/Nisit/resource/yes.png'  width='25' height='25'></th>";
                    } else {
                        echo "<th> ไม่ผ่านคัดเลือก<img class='centerimages' src='http://localhost/Intern/Nisit/resource/no.png'   width='25' height='25'></th>";
                    }
                } elseif ($table == 'tunasup') {
                    echo "<th><a href='http://localhost/Intern/show.php?tunname=tunasup&id= " . $row['id'] . " &user=" . $row['user'] . "&time=" . $row['time'] . "'>" . $row['user'] . "</a></th>";
                    $user = $row['user'];
                    $Dsql = "SELECT * FROM nisit  ";
                    $resultUser = $conn->query($Dsql);
                    $Fuser = $resultUser->fetch_assoc();


                    // print_r($Fuser);
                    echo ('<th>' . $Fuser['thainame'] . " " . $Fuser['thaisurname'] . '</th>');
                    echo ('<th>' . $Fuser['year'] . '</th>');
                    echo ('<th>' . $Fuser['sec'] . '</th>');


                    $regis = explode("|", $Fuser['keep']);
                    // echo ("<pre>");echo ("<pre>");
                    // print_r($regis);
                    if ($regis[15]) {
                        echo ('<th>' . $regis[15] . '</th>');
                    } else {
                        echo ('<th>รอข้อมูล</th>');
                    }


                    if ($row['status']) {
                        echo "<th> รอสอบสัมภาษณ์<img class='centerimages' src='http://localhost/Intern/Nisit/resource/yes.png'  width='25' height='25'></a></th>";
                    } else {
                        echo "<th>  ไม่ผ่านคัดเลือก<img class='centerimages' src='http://localhost/Intern/Nisit/resource/no.png'   width='25' height='25'></a></th>";
                    }
                } elseif ($table == 'emergency') {
                    echo "<th><a href='http://localhost/Intern/show.php?tunname=tunasup&id= " . $row['id'] . " &user=" . $row['user'] . "&time=" . $row['time'] . "'>" . $row['user'] . "</a></th>";
                    $user = $row['user'];
                    $Dsql = "SELECT * FROM nisit  ";
                    $resultUser = $conn->query($Dsql);
                    $Fuser = $resultUser->fetch_assoc();


                    // print_r($Fuser);
                    echo ('<th>' . $Fuser['thainame'] . " " . $Fuser['thaisurname'] . '</th>');
                    echo ('<th>' . $Fuser['year'] . '</th>');
                    echo ('<th>' . $Fuser['sec'] . '</th>');


                    $regis = explode("|", $Fuser['keep']);
                    // echo ("<pre>");echo ("<pre>");
                    // print_r($regis);
                    if ($regis[15]) {
                        echo ('<th>' . $regis[15] . '</th>');
                    } else {
                        echo ('<th>รอข้อมูล</th>');
                    }


                    if ($row['status']) {
                        echo "<th> รอสอบสัมภาษณ์ <img class='centerimages' src='http://localhost/Intern/Nisit/resource/yes.png'  width='25' height='25'></a></th>";
                    } else {
                        echo "<th> ไม่ผ่านคัดเลือก<img class='centerimages' src='http://localhost/Intern/Nisit/resource/no.png'   width='25' height='25'></a></th>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>
        <script>
            function myFunction() {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
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