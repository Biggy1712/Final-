<?php
error_reporting(0);
session_start();
ob_start();
$user = $_SESSION['user'];
if ($_SESSION['login3'] != "true") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: http://localhost/intern/Nisit/loginTeacher.php");
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
        #myInput {
            background-image: url('/css/searchicon.png');
            /* Add a search icon to input */
            background-position: 10px 12px;
            /* Position the search icon */
            background-repeat: no-repeat;
            /* Do not repeat the icon image */
            width: 100%;
            /* Full-width */
            font-size: 16px;
            /* Increase font-size */
            padding: 12px 20px 12px 40px;
            /* Add some padding */
            border: 1px solid #ddd;
            /* Add a grey border */
            margin-bottom: 12px;
            /* Add some space below the input */
        }

        #myTable {
            border-collapse: collapse;
            /* Collapse borders */
            width: 100%;
            /* Full-width */
            border: 1px solid #ddd;
            /* Add a grey border */
            font-size: 18px;
            /* Increase font-size */
        }

        #myTable th,
        #myTable td {
            text-align: left;
            /* Left-align text */
            padding: 12px;
            /* Add padding */
        }

        #myTable tr {
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header,
        #myTable tr:hover {
            /* Add a grey background color to the table header and on hover */
            background-color: #f1f1f1;
        }

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
    include "../Nisit/resource/navIndex.php";
    include "../connectDb.php";
    $totalWorkTime = 0;
    ?>

    <div>
        <br>
        <hr>
        <br>
        <?php
        $keyword;
        // print_r($_SESSION);
        ?>
        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="keyword">Keyword : </label>
            <input type="text" id="keyword" name="keyword"><br><br>
            <input type="submit" value="search" name="search">
            <?php
                if($_GET['search']){
                    $keyword = $_GET['keyword'];
                    // print_r($_GET);
                    if($keyword){
                        print_r("คุณ search -> $keyword");

                    }
                }

            ?>
        </form>

        <table id="myTable" class="display" style="width:90%;text-align:center;margin-left:auto;margin-right:auto;  border-collapse: collapse;  border: 1px solid black; ">
            <?php
            $count = 0;
            $count2 = 0;
            // if ($table == 'tunasup') {
            echo ('
                <tr>
                    <th class="header">วันที่</th>
                    <th class="header">username</th>
                    <th class="header">ชื่อ</th>
                    <th class="header">ชื่ออาจาร</th>
                    <th class="header">งาน</th>
                    <th class="header">ใบสำคัญรับเงิน</th>
                    <th class="header">ใบประเมินผล</th>
                    <th class="header">เวลา ชม.</th>
                    

                </tr>');
            // } 

            // echo ($table); 
            // echo("<br>");
            if($keyword != null && $keyword != ''){
                $sql = "SELECT * FROM worktine where user = '$keyword' order by user ";
            }else{
                $sql = "SELECT * FROM worktine  order by user ";
            }

            // echo($sql);
            // echo("<br>");
            $result = $conn->query($sql);
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

                if ($time) {
                    echo ('<th>' . gmdate("d-m-Y", $time) . '</th>');
                } else {
                    echo ('<th>ไม่มีการลงเวลา</th>');
                }


                if ((int) $totalWorkTime == $totalWorkTime) {
                    $totalWorkTime = $totalWorkTime + (float)$timework;
                }

                echo ('<th>' . $user . '</th>');
                echo ('<th>' . $name . '</th>');
                echo ('<th>' . $teachername . '</th>');
                echo ('<th>' . $work . '</th>');
                echo ('<th><a href="http://localhost/Intern/staff/download.php?file_name=C:\xampp\htdocs\Intern\downloadTeacher\money.doc">download</a></th>');
                echo ('<th><a href="http://localhost/Intern/staff/download.php?file_name=C:\xampp\htdocs\Intern\downloadTeacher\evaluate.pdf">download</a></th>');
                echo ('<th>' . $timework . '</th>');

                echo "</tr>";
            }
            echo "<tr><th>เวลารวม</th><th></th><th></th><th></th><th></th><th></th><th></th><th>$totalWorkTime ชม.</th></tr>";
            ?>
        </table>

        <br>
        <hr><br><br>

        <div class="bigBox">
            <h1 style="align-content: center;align-items: center;text-align: center;">อัปโหลดไฟลอาจารย์</h1>
            <div class="container mt-3">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <p>user นิสิต</p>
                    <div>
                        <input type="text" rows="1" class="form-control" name="name"> </input>
                    </div> <br>
                    <p>ใบประเมินผล :</p>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="evaluate" name="filename1">
                        <label class="custom-file-label" for="evaluate">Choose file</label>
                    </div>
                    <p>ใบสำคัญรับเงิน :</p>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="money" name="filename2">
                        <label class="custom-file-label" for="money">Choose file</label>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    </div>

                </form>
                <?php
                if (isset($_POST["submit"])) {
                    echo ('<pre>');
                    $fornisit = $_POST['name'];
                    $filepaths = [];

                    $i = 1;
                    $target_dir = "C:/xampp/htdocs/Intern/uploadFIle/teacherupload/";
                    for ($i = 1; $i != 3; $i++) {
                        $vaild = false;
                        $spl = new SplFileInfo($_FILES["filename$i"]['name']);
                        $file_parts = pathinfo($spl);

                        if ($_FILES["filename$i"]['name'] != "") {

                            if ($i == 1 && $file_parts['extension']) {
                                $name = "ใบประเมินผล";
                                $vaild = true;
                            } elseif ($i == 2 && $file_parts['extension']) {
                                $name = "ใบสำคัญรับเงิน";
                                $vaild = true;
                            }
                            if ($vaild == true) {
                                $file_name = $_SESSION['user'] . "_" . $name . "_" . time() . ".pdf";
                                $target_file = $target_dir . basename($_FILES["filename$i"]["name"]);
                                $destination = $target_dir . $file_name;

                                move_uploaded_file($_FILES["filename$i"]['tmp_name'], $target_dir . $file_name);
                                array_push($filepaths, $destination);
                            } else {
                                echo ('file damaged or incerrect');
                            }
                        }
                    }

                    $sql = "INSERT INTO teacherupload( user, evaluatepath, moneypath, time, fornisit) 
                    VALUES ('" . $_SESSION['user'] . "', '$filepaths[0]','$filepaths[1]'," . time() . " ,'$fornisit')";

                    $result = $conn->query($sql);

                    $sql2 = "UPDATE work SET evaluatepath='$filepaths[0]', moneypath='$filepaths[1]',teachername='$teachername' WHERE user='$fornisit'  ";
                    // print_r($sql2);
                    $result2 = $conn->query($sql2);


                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $_SESSION['postdata'] = $_POST;
                        unset($_POST);
                        header("Location: http://localhost/intern/staff/successStaff.php");
                        exit;
                    }
                }
                ?>

            </div>
        </div>
        <br>
        <hr><br><br>
    </div>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("th");

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
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            console.log(fileName);
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script>
        $(document).ready(function() {
            $(' #myTable').DataTable();
        });
    </script>
</body>

</html>