<!DOCTYPE html>
<html lang="en">
<?php
session_start();
ob_start();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http:\\localhost\Intern\Nisit\resource\css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>
<style>
    * {
        font-family: 'Kanit', sans-serif;
    }

    h2 {
        padding: 20px;
    }

    .container {
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .container1 {
        padding: 4px;
    }

    .col {
        position: relative;
        margin-bottom: 10px;
        padding-bottom: 20px;
    }

    .container1 label {
        color: gray;
        display: block;
        margin-bottom: 5px;
    }

    .btn {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
        margin-top: 0;
    }

    .account {
        text-align: center;
    }
</style>

<body>
    <?php
    include '../connectDb.php';
    include 'resource/nav.php';
    ?>
    <div style="margin: auto; align-content:center">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <div class="container mt-3">
                <h2>สมัครอาจารย์</h2>
                <div class="container1">
                    <div class="row">
                        <div class="col ">
                            <label for="usename">Account id </label>
                            <input type="text" class="form-control" placeholder="user " name="user" require>
                            <small>กรุณาระบุ</small>
                        </div>
                        <div class="col">
                            <label for="password"> Account password </label>
                            <input type="password" class="form-control" placeholder="password" name="pass" require>
                            <small>กรุณาระบุ</small>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col ">
                            <label for="aa">ชื่อ – สกุล ภาษาไทย</label>
                            <input type="text" class="form-control" placeholder="name " name="name" require>
                            <small>กรุณาระบุ</small>
                        </div>
                        <div class="col">
                            <label for="bb">ชื่อ – สกุล ภาษา อังกฤษ</label>
                            <input type="text" class="form-control" placeholder="engname" name="engname" require>
                            <small>กรุณาระบุ</small>
                        </div>
                        <div class="col">
                            <label for="cc">Ku wedmail</label>
                            <input type="text" class="form-control" placeholder="mail" name="mail" require>
                            <small>กรุณาระบุ</small>
                        </div>
                        <div class="col">
                            <label for="d">คณะวิชา/สังกัด</label>
                            <input type="text" class="form-control" placeholder="sec" name="sec" require>
                            <small>กรุณาระบุ</small>
                        </div>
                    </div>
                </div>


                <br>
                <div class="p">
                    <p class="account"><br />
                        Already have an account? <a href="http://localhost/intern/nisit/loginTeacher.php">Login here</a>
                    </p>
                </div>
                <button type="submit" name="submit" value="true" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal" data-backdrop="static" data-keyboard="false">
                    subbmit
                </button>

                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (() => {
                        'use strict';

                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        const forms = document.querySelectorAll('.needs-validation');

                        // Loop over them and prevent submission
                        Array.prototype.slice.call(forms).forEach((form) => {
                            form.addEventListener('submit', (event) => {
                                if (!form.checkValidity()) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    })();
                </script>

                <?php
                if (isset($_REQUEST['submit'])) {

                    $stringToDb = "";
                    foreach ($_POST as $key => $value) {
                        echo ($value);
                        $stringToDb = $stringToDb . '|' . $value;
                    }
                    $user = $_REQUEST['user'];
                    $pass = $_REQUEST['pass'];
                    // $thaiprename = $_REQUEST['thaiprename'];
                    // $thainame = $_REQUEST['thainame'];
                    // $thaisurname = $_REQUEST['thaisurname'];
                    // $engprename = $_REQUEST['engprename'];
                    // $engname = $_REQUEST['engname'];
                    // $engsurname = $_REQUEST['engsurname'];
                    // $nisitid = $_REQUEST['nisitid'];
                    // $year = $_REQUEST['year'];
                    // $sec = $_REQUEST['sec'];
                    // $email = $_REQUEST['email'];
                    // $line = $_REQUEST['line'];
                    // $tel = $_REQUEST['tel'];

                    $stringToDb = "";
                    $count = 0;
                    foreach ($_GET as $key => $value) {
                        // echo ($value);
                        // echo '<br>';
                        // echo $count;
                        $count++;
                        $stringToDb = $stringToDb . '|' . $value;
                    }

                    // print_r($stringToDb);

                    // $sqls = "INSERT INTO nisit (keep)
                    //         VALUES ('$stringToDb')";



                    //  $sql = "INSERT INTO formtemp (tunname,user, keep)
                    // VALUES ('work','$$'_REQUEST'["] . $_SESSION['user'] . "', '$stringToDb')";
                    // thaiprename thainame thaisurname engprename engname engsurname nisitid year sec email line tel
                    // $sql = "INSERT INTO nisit (user,pass,thaiprename,thainame,name,thaisurname,engprename,engname,engsurname,nisitid,year,sec,email,line,tel,keep) 
                    // VALUES ('$user','$pass','$thaiprename','$thainame','$thainame','$thaisurname','$engprename','$engname','$engsurname','$nisitid','$year','$sec','$email','$line','$tel','$stringToDb') ";

                    $sql = "INSERT INTO teacher (user,pass,keep) VALUES ('$user','$pass','$stringToDb')";

                    // WHERE user = '" . $_SESSION['user'] . "'
                    $chechDuplicateUserSQL = "SELECT user FROM teacher where user = '$user' ";

                    $res = $conn->query($chechDuplicateUserSQL);
                    if ($row = $res->fetch_assoc()) {
                        echo ("this user is already register");
                    } else {
                        $conn->query($sql);
                        echo '<hr><p style=" text-align: center;width:80%; margin:auto;" color="green">Yay!! Your account has been created. <a href="http://localhost/intern/nisit/loginTeacher.php">Click here</a> to login!<p>';
                    }
                    // $row = $res -> fetch_row();
                    // echo $_SESSION['user'];
                } else if (isset($error_msg)) {
                    echo '<p color="red">' . $error_msg . '</p>';
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_SESSION['postdata'] = $_POST;
                    unset($_POST);
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                }
                ?>
                <br>
        </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>