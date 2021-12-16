<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
include "../Nisit/resource/navIndex.php"
?>

<body>
    <hr>
    <div class="row" style="margin-left: auto;margin-right:auto;width:90%">
        <div class="column" > <img src="http://localhost/intern/nisit/resource/Newpic1.png" width="60%" /></div>

        <div class="column" style="align-content: center;"><br><br><br><br><a>
                <h1 style="margin-left:10%;">ลงทะเบียนสมัคร ทุนช่วยงานอาจารย์</h1>
            </a>
            <div><br><button style="width:200px;margin-left: 42%;" class="btn btn-success" onclick="window.location.href='http://localhost/Intern/Nisit/schoolarShip/work.php'">Click</button></div>
        </div>
    </div>
    <br><br><br>
    <div class="row" style="margin-left: auto;margin-right:auto;width:90%">
        <div class="column" style="align-content: center;"><br><br><br><br><br><br><br><br><br><br><a>
                <h1 style="margin-left:10%;">ดูเวลาการทำงาน ทุนช่วยงานอาจารย์</h1>
            </a>
            <div><br><button style="width:200px;margin-left: 42%;align-content: center;" class="btn btn-success" onclick="window.location.href='http://localhost/intern/nisit/loginTeacher.php'">Click</button></div>
        </div>
        <div class="column"> <img src="http://localhost/intern/nisit/resource/Newpic1.png" width="60%" /></div>


    </div>
</body>

</html>