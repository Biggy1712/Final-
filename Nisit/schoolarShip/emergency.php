<?php
session_start();
ob_start();
if ($_SESSION['login'] != "true") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: http://localhost/intern/nisit/loginNisit.php");
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
     
    </style>
</head>

<body>
    <?php
    include "../resource/nav.php";
    ?>
    <div class="bigBox" style="width: 80%;">
        <div class="container-fluid p-4 text-center">
            <h1>ทุนนิสิตฉุกเฉิน</h1>           
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <img src="http://localhost/Intern/Nisit/resource/Mathematics-bro.png" style="width: 50%;"/>
        </div>
        <div> 
            <h2 class="text-center">รายละเอียดทุนทุนนิสิตฉุกเฉิน  
                <a href="http://localhost/Intern/Nisit/schoolarShip/showEmergencypdf.php" style="color:red">คลิกที่นี่ !!</a>
            </h2>
        </div>
        <div class="p-5">
                <button class="btnleft"><a href="http:\\localhost\Intern\Nisit\schoolarShip\emergencyForm.php">สมัคร</a></button>
                <!-- <button class="btnright"><a href="http:\\localhost\Intern\Nisit\schoolarShip\emergencyUp.php">upload</a></button> -->
        </div>
      </div>
</body>

</html>