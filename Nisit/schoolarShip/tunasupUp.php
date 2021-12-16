<?php
session_start();
ob_start();
if ($_SESSION['login'] != "true") {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: http://localhost/intern/nisit/loginNisit.php");
    session_destroy();
}
$name = '';
$vaild = false;
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
include "../resource/nav.php";
include "../../connectDb.php";
?>

<body>
    <div class="bigBox">
        <div class="container mt-3">
            <h2 style="text-align: center;">เอกสารที่นิสิตต้อง Upload</h2> <br>
            <hr><br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                <p>ใบรับรองรายได้ผู้ปกครอง :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="filename2" name="filename2">
                    <label class="custom-file-label" for="filename2">Choose file</label>
                </div>
                <p>สำเนาบัตรประตัวนิสิต :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="filename3" name="filename3">
                    <label class="custom-file-label" for="filename3">Choose file</label>
                </div>
                <p>ใบรายงานผลการเรียน ณ ปัจจุบัน จาก my ku :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="filename4" name="filename4">
                    <label class="custom-file-label" for="filename4">Choose file</label>
                </div>
                <p>ตารางเรียนปีการศึกษา จาก my ku :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="filename5" name="filename5">
                    <label class="custom-file-label" for="filename5">Choose file</label>
                </div>
                <p>สำเนาหน้าสมุดบัญชี ทหารไทย ไทยพาณิชย์ ประเภทบัญชีออมทรัพย์ที่นิสิตเป็นเจ้าของ :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="filename6" name="filename6">
                    <label class="custom-file-label" for="filename6">Choose file</label>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                </div>
            </form>
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
    $filepaths = [];
    $i = 1;
    $target_dir = "C:/xampp/htdocs/Intern/uploadFIle/tunasup/";
    for ($i = 1; $i != 6; $i++) {
        $vaild = false;
        $spl = new SplFileInfo($_FILES["filename$i"]['name']);
        $file_parts = pathinfo($spl);

        if ($_FILES["filename$i"]['name'] != "") {

            if ($i == 1 && $file_parts['extension'] == 'pdf') {
                $vaild = true;
                $name = "ใบรับรองรายได้ผู้ปกครอง";
            } elseif ($i == 2 && $file_parts['extension'] == 'pdf') {
                $vaild = true;
                $name = "สำเนาบัตรประตัวนิสิต";
            } elseif ($i == 3 && $file_parts['extension'] == 'pdf') {
                $vaild = true;
                $name = "ใบรายงานผลการเรียน";
            } elseif ($i == 4 && $file_parts['extension'] == 'pdf') {
                $vaild = true;
                $name = "ตารางเรียนปีการศึกษา";
            } elseif ($i == 5 && $file_parts['extension'] == 'pdf') {
                $vaild = true;
                $name = "สำเนาหน้าสมุดบัญชี";
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
    print_r($filepaths);
    $sql = "INSERT INTO tunasup( user,parent_path , nisitidcard_path, gpa_path, study_path, bank_path, time) 
    VALUES ('" . $_SESSION['user'] . "', '$filepaths[0]','$filepaths[1]','$filepaths[2]','$filepaths[3]','$filepaths[4]'," . time() . ")";
    $result = $conn->query($sql);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

</html>