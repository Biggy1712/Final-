<?php
// error_reporting(0);
session_start();
ob_start();
$user = $_SESSION['user'];
if ($_SESSION['login'] != "true") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: http://localhost/intern/nisit/loginNisit.php");
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http:\\localhost\Intern\Nisit\resource\css.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        textarea {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;

            width: 100%;
        }

        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 20px;
            height: auto;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
    <style>
        .form__group {
            position: relative;
            padding: 15px 0 0;
            margin-top: 10px;
            width: 50%;
        }

        .form__field {
            font-family: inherit;
            width: 180%;
            border: 0;
            border-bottom: 2px solid #9b9b9b;
            outline: 0;
            font-size: 1.3rem;
            color: black;
            padding: 7px 0;
            background: transparent;
            transition: border-color 0.2s;
        }

        .form__field::placeholder {
            color: transparent;
        }

        .form__field:placeholder-shown~.form__label {
            font-size: 1.3rem;
            cursor: text;
            top: 20px;
        }

        .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 1rem;
            color: #9b9b9b;
        }

        .form__field:focus {
            padding-bottom: 6px;
            font-weight: 700;
            border-width: 3px;
            border-image: linear-gradient(to right, #11998e, #38ef7d);
            border-image-slice: 1;
        }

        .form__field:focus~.form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 1rem;
            color: #11998e;
            font-weight: 700;
        }

        /* reset input */
        .form__field:required,
        .form__field:invalid {
            box-shadow: none;
        }

        /* demo */
        /* body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-size: 1.5rem;
            background-color: #222;
        }  */

        .register .btn {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 20%;
            margin-top: 2%;
        }

        .register .modal-footer {
            display: block;
            align-items: center;
            justify-content: flex-end;

        }

        .container1 label {
            color: gray;
            display: block;
            margin-bottom: 5px;
        }
    </style>

</head>

<body>
    <?php
    include "./resource/nav.php";
    include "../connectDb.php";
    $totalWorkTime = 0;
    ?>

    <div>
        <!-- <div style="margin: auto;width: 50%;text-align: center;">
            <a href="http://localhost/Intern/result.php?table=tunasup">| ทุนขาดแคลนทุนทรัพย์ |</a>
            <a href="http://localhost/Intern/result.php?table=work"> ทุนช่วยงาน |</a>
            <a href="http://localhost/Intern/result.php?table=emergency"> ทุนฉุกเฉิน |</a>

        </div> -->
        <br>
        <hr>
        <br>
        <?php
      
        ?>
        <table id="myTable" class="display" style="width:90%;text-align:center;margin-left:auto;margin-right:auto;  border-collapse: collapse;  border: 1px solid black; ">
            <?php
            $count = 0;
            $count2 = 0;
            // if ($table == 'tunasup') {
                echo ('
                <tr>
                    <th class="header">วันที่</th>
                    <th class="header">ชื่อ</th>
                    <th class="header">ชื่ออาจาร</th>
                    <th class="header">งาน</th>
                    <th class="header">เวลา ชม.</th>

                </tr>');
            // } 
            
            // echo ($table); 
            // echo("<br>");
            $sql = "SELECT * FROM worktine where user = '$user' order by user ";
            
            // echo($sql);
            // echo("<br>");
            $result = $conn->query($sql);
            // echo("<pre>");
            // print_r($result);
            // error_reporting(0);
            $master = [];
            $secArr = [];
            $userarr = array();
            $userarrsub = array();
            $userarrsubmore = array();

            while ($row = $result->fetch_assoc()) {

                echo "<tr>";

                // echo("<pre>");
                
                // print_r($row);
                $user = $row['user'];
                $time = $row['time'];
                $keep = $row['keep'];
                $teachername = $row['teachername'];
                $name = $row['name'];
                $timework = $row['timework'];
                $work = $row['work'];

                if($time){
                    echo ('<th>' . gmdate("d-m-Y", $time). '</th>');
                }else{
                    echo('<th>ไม่มีการลงเวลา</th>');
                }
                
                
                if ((int) $totalWorkTime == $totalWorkTime) {
                    $totalWorkTime = $totalWorkTime + (float)$timework;
                }
                echo ('<th>' . $name . '</th>');
                echo ('<th>' . $teachername . '</th>');
                echo ('<th>' . $work . '</th>');
                echo ('<th>' . $timework . '</th>');
                

                //     $Dsql = "SELECT * FROM nisit  ";
                //     $resultUser = $conn->query($Dsql);
                //     $Fuser = $resultUser->fetch_assoc();

                //     echo ('<th>' . $Fuser['thainame'] . " " . $Fuser['thaisurname'] . '</th>');
                    
                //     echo ('<th>' . $Fuser['sec'] . '</th>');


                //     $regis = explode("|", $Fuser['keep']);
                    
                //     if ($regis[15]) {
                //         echo ('<th>' . $regis[15] . '</th>');
                //     } else {
                //         echo ('<th>รอข้อมูล</th>');
                //     }
                //     if ($row['status']) {
                //         echo "<th> รอสอบสัมภาษณ์<img class='centerimages' src='http://localhost/Intern/Nisit/resource/yes.png'  width='25' height='25'></th>";
                //     } else {
                //         echo "<th> ไม่ผ่านคัดเลือก<img class='centerimages' src='http://localhost/Intern/Nisit/resource/no.png'   width='25' height='25'></th>";
                //     }
                // // } 
                echo "</tr>";
                
            }
            echo "<tr><th>เวลารวม</th><th></th><th></th><th></th><th>$totalWorkTime ชม.</th></tr>";
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