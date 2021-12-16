<?php
error_reporting(0);
session_start();
ob_start();
if ($_SESSION['login2'] != "true") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: http://localhost/intern/Staff/login_Staff.php");
    session_destroy();
}
$name = '';
$vaild = false;


if ($_REQUEST['table']) {
    $table = $_REQUEST['table'];
} else {
    $table = 'tunasup';
}
// print_r($table);

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http:\\localhost\Intern\Nisit\resource\css.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btnleft {
            margin-top: 50px;
            width: 200px;
            height: 50px;
            font-size: x-large;
            margin-left: 10%;
        }

        .btnright {
            margin-top: 50px;
            width: 300px;
            /* height: 50px; */
            font-size: x-large;
            float: right;
            margin-right: 10%;
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
<?php
include "../Nisit/resource/navStaff.php";
?>

<body>
    <div class="bigBox">
        <div class="container mt-3">
            <h2 style="text-align: center;">หน้าอัปโหลดเอกสาร</h2> <br>
            <hr><br>
            <div style="margin: auto;width: 50%;text-align: center;">
                <a href="http://localhost/Intern/Staff/uploadStaff.php?table=tunasup">| ทุนขาดแคลนทุนทรัพย์ |</a>
                <a href="http://localhost/Intern/Staff/uploadStaff.php?table=work"> ทุนช่วยงาน |</a>
                <a href="http://localhost/Intern/Staff/uploadStaff.php?table=emergency"> ทุนฉุกเฉิน |</a>

            </div>
            <br>
            <hr>
            <br>
            <?php
            // print_r($table);
            if ($table == 'tunasup') {
                echo ('
                <form action=" ' . $_SERVER['PHP_SELF']."?from=tunasup" . '" method="post" enctype="multipart/form-data">
                <p>ทุนขาดแคลนทุนทรัพย์ :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="tunasup" name="tunasup">
                    <label class="custom-file-label" for="tunasup">Choose file</label>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" name="submit" value="tunasup">Submit</button>
                </div>
            
                </form>
                ');
            } elseif ($table == 'work') {
                echo ('
                <form action=" ' . $_SERVER['PHP_SELF'] ."?from=work" . '" method="post" enctype="multipart/form-data">
                    <p>ทุนช่วยงาน :</p>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="work" name="work">
                        <label class="custom-file-label" for="work">Choose file</label>
                    </div>
                    <div class="mt-3">
                    <button type="submit" class="btn btn-primary" name="submit" value="work">Submit</button>
                </div>
            
                </form>
                ');
            } elseif ($table == 'emergency') {
                echo ('
                <form action=" ' . $_SERVER['PHP_SELF'] ."?from=emergency" . '" method="post" enctype="multipart/form-data">
                    <p>ทุนฉุกเฉิน :</p>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="emergency" name="emergency">
                        <label class="custom-file-label" for="emergency">Choose file</label>
                    </div>
                    <div class="mt-3">
                    <button type="submit" class="btn btn-primary" name="submit" value="emergency">Submit</button>
                </div>
            
                </form>
                ');
            } ?>


        </div>
    </div>
</body>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        console.log(fileName);
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<?php
if (isset($_POST["submit"])) {
    // print_r("working");
    echo("<pre>");
    // print_r($_POST['submit']);
    $fileFrom = $_POST['submit']; 
    // print_r($_FILES);
    // $i = 1;
    
    $target_dir = "C:/xampp/htdocs/Intern/uploadStaff/";
    // for ($i = 1; $i != 6; $i++) {
    
    $spl = new SplFileInfo($_FILES[$fileFrom]['name']);
    $file_parts = pathinfo($spl);
    print_r($file_parts);

    // 
    print_r($spl);
    // echo("<hr>");

    // print_r($file_parts);
    // if ($_FILES["filename$i"]['name'] != "") {

    if ($fileFrom == 'tunasup') {


        $file_name = "tunasup.pdf";
        $target_file = $target_dir . basename($_FILES[$fileFrom]["name"]);
        print_r($target_dir);
        move_uploaded_file($_FILES[$fileFrom]['tmp_name'], $target_dir . $file_name);
        header("Location: http://localhost/intern/staff/successStaff.php");


    } elseif ($fileFrom == 'emergency') {


        $file_name = "emergency.pdf";
        $target_file = $target_dir . basename($_FILES[$fileFrom]["name"]);
        print_r($target_dir);
        move_uploaded_file($_FILES[$fileFrom]['tmp_name'], $target_dir . $file_name);
        header("Location: http://localhost/intern/staff/successStaff.php");


    } elseif ($fileFrom == 'work') {


        $file_name = "work.pdf";
        $target_file = $target_dir . basename($_FILES[$fileFrom]["name"]);
        print_r($target_dir);
        move_uploaded_file($_FILES[$fileFrom]['tmp_name'], $target_dir . $file_name);
        header("Location: http://localhost/intern/staff/successStaff.php");
    }
    // }
    // }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

</html>