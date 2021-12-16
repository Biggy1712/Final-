<?php
session_start();
ob_start();
// session_destroy();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate");
$_SESSION['login'] = "false";
// echo ($_SESSION['login']);
// $_POST['user'] = "2";
// $_POST['pass'] = "3";

include "../connectDb.php";
include "./resource/nav.php";

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
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            padding-top: 200px;
            align-items: center;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

        .centers {
            /* padding-top: 8%; */
            display: flex;
            margin: auto;
            width: 60%;
            height: auto;
            /* background-color: goldenrod; */
        }
    </style>
</head>

<body>
    <div style="padding-top: 8%;">
    </div>
    <div style="background-color: rgb(247 247 247);">
        <div class="centers">
            <div class="word">
                <h1><br>ระบบสมัครขอรับทุนการศึกษา<br>มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตศรีราชา</h1>
            </div>
            <div class="formss">
                <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="container">
                        <label for="user"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="user" value="" required="">
                        <label for="pass"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="pass" value="" required="">
                        <button type="submit" name="submit">Login</button>
                        <a style="text-align: center; margin-top: 0" href="http://localhost/intern/nisit/regis.php" type="submit" name="submit" value="true" class="btn btn-primary">click here to registration</a>
                    </div>

                    <?php
                    if (isset($_POST['user']) && isset($_POST['pass'])) {

                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        // echo ($_POST['user'] . $_POST['pass']);
                        $sql = "SELECT user,pass,name,tel  FROM nisit  WHERE user='$user' and pass='$pass' ";
                        $result = $conn->query($sql);
                        if ($result) {
                            // echo ("<br>");
                            // print_r($result);

                            if ($row = $result->fetch_assoc()) {
                                $name = $row['name'];
                                $tel = $row['tel'];
                                $_SESSION['login'] = "true";
                                if ($_SESSION['login'] == "true") {
                                    $_SESSION['user'] = $user;
                                    $_SESSION['name'] = $name;
                                    $_SESSION['tel'] = $tel;

                                    header("Location: http://localhost/intern/Nisit/homeNisit.php");
                                }
                                // echo $row['user'] . $row['pass'];
                            }
                        }
                    }
                    ?>
                </form>


            </div>
        </div>
    </div>
    <footer style=" padding-bottom: 25px;">
        <p>ต้องการทราบรายละเอียดเพิ่มเติม หรือมีปัญหาในการสมัคร กรุณาติดต่อ งานกิจการนิสิต โทร. 06-5716-2628 email : malai.pa@ku.th </p>
    </footer>
</body>

</html>