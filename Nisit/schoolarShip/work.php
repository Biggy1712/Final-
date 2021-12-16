<?php
session_start();
ob_start();

// if ($_SESSION['login'] != "true") {
//     header("HTTP/1.1 401 Unauthorized");
//     header("Location: http://localhost/intern/nisit/loginNisit.php");
//     session_destroy();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http:\\localhost\Intern\Nisit\resource\css.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btnleft {
            width: 200px;
            height: 50px;
            font-size: x-large;
            margin-left: 44%;
        }

        .btnright {
            width: 200px;
            height: 50px;
            font-size: x-large;
            float: right;
            margin-right: 20%;
        }

        h1 {
            display: block !important;
            font-size: 36px !important;
            font-weight: bold;
        }

        h2 {
            display: block !important;
            font-size: 26px !important;
            font-weight: bold;
        }

        p {
            font-size: 18px !important;
        }

        .Textcontainer {
            border: 2px solid #ccc;
            padding: 10px;
            width: 20em;
        }

        .itemTxt {
            width: -moz-fit-content;
            width: fit-content;
            background-color: #8ca0ff;
            padding: 5px;
            margin-bottom: 1em;
        }

        .workheader1 {
            font-size: 26px;
            text-align: center;
        }

        .workheader2 {
            display: flex;
            justify-content: center;
            margin: auto
        }

        .workheader2 img {
            width: 50%;
        }

        .workheader3 {
            padding-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include "../resource/nav.php";
    ?>
    <div class="bigBox" style="width: 80%;">
        <div class="workheader1">
            <h1>ทุนช่วยงานอาจารย์</h1>
        </div>
        <hr>
        <div class="workheader2 ">
            <img src="http://localhost/Intern/Nisit/resource/Learning-bro.png" />
        </div>
        <div>
            <h2 class="workheader3">รายละเอียดทุนช่วยงานอาจารย์
                <a href="http://localhost/Intern/Nisit/schoolarShip/showWorkpdf.php" style="color:red">คลิกที่นี !!</a>
            </h2>
        </div>

        <button class="btnleft"><a href="http:\\localhost\Intern\Nisit\schoolarShip\workForm.php">สมัคร</a></button>
        <!-- <button class="btnright"><a href="http:\\localhost\Intern\Nisit\schoolarShip\workUp.php">upload</a></button> -->

    </div>
</body>

</html>