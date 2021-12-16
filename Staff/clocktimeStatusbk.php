<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
session_start();
ob_start();
if ($_SESSION['login3'] != "true") {
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
            $user = $_SESSION['user'];
            echo ('
             <tr>
                 <th>user</th>
                 <th>ชื่อ-สกุล</th>
                 <th>งานที่ทำ</th>
                 <th>เวลา</th>
                 <th>ชื่ออาจารย์</th>
             </tr>');

            $sql = "SELECT * FROM worktine ";
            $result = $conn->query($sql);
            
            $master = [];
            $secArr = [];
            $userarr = array();
            $userarrsub = array();
            $userarrsubmore = array();
            while ($row = $result->fetch_assoc()) {
                // echo("<pre>");

                // print_r($row);
                $user = $row['user'];
                $work = $row['work'];
                $name = $row['name'];
                $teachername = $row['teachername'];
                $timework = $row['timework'];
                // $work = $row['work'];
                echo "<tr>";
                echo "<th>$user</th>";
                echo "<th>$name</th>";

                echo "<th>$work</th>";
                echo "<th>$timework</th>";
                echo "<th>$teachername</th>";
                
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