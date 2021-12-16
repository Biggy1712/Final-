<?php
error_reporting(0);
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
    include "../resource/nav.php";
    include "../../connectDb.php"
    ?>
    <div class="bigBox" style="height: fit-content !important;">
        <br>
        <h1 style="text-align: center;">หน้ากรอกการสมัครทุนขาดแคลน</h1> <br>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h2> นิสิตได้รับเงินค่าใช้จ่าย</h2>
            <div class="container1">
                <div class="row pt-2 ">
                    <div class="col ">
                        <label for="expend">นิสิตได้รับเงินค่าใช้จ่ายเดือนละ </label>
                        <input type="text" class="form-control" placeholder="นิสิตได้รับเงินค่าใช้จ่ายเดือนละ" name="expend">
                    </div>
                    <div class="col "><label for="specifyexpend">จาก (ระบุชื่อ)</label>
                        <input type="text" class="form-control" placeholder="(ระบุชื่อ)" name="specifyexpend">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col"><label for="joiner">เกี่ยวข้องเป็น</label>
                        <input type="text" class="form-control" placeholder="เกี่ยวข้องเป็น" name="joiner">
                    </div>
                    <div class="col"><label for="job">อาชีพ</label>
                        <input type="text" class="form-control" placeholder="อาชีพ" name="job">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col"><label for="workplace">สถานที่ประกอบอาชีพ</label>
                        <input type="text" class="form-control" placeholder="สถานที่ประกอบอาชีพ" name="workplace">
                    </div>
                    <div class="col"><label for="income">รายได้เดือนละ</label>
                        <input type="text" class="form-control" placeholder="รายได้เดือนละ" name="income">
                    </div>
                </div><br>
                <h2> นิสิตมีรายได้จากการทำงานนอกเวลาการศึกษาหรือทางอื่นประมาณเดือนละ </h2>
                <div class="row pt-2">
                    <div class="col"><label for="income">รายได้เดือนละ</label>
                        <input type="text" class="form-control" placeholder="รายได้เดือนละ" name="inco3me">
                    </div>
                    <div class="col"><label for="typeofwork">ประเภทงานที่ทำ</label>
                        <input type="text" class="form-control" placeholder="ประเภทงานที่ทำ" name="typeofwork">
                    </div>
                </div>
                <br>
                <!-- <div class="row pt-2"> -->
                <div class="col">
                    <label>ระบุสาเหตุของการรับทุน</label>
                    <div>
                        <input type="text" rows="1" class="form-control" name="dump"> </input>
                    </div> <br>
                    <label>ระบุทุนการศีกษาและปีการศึกษาที่เคยได้รับทุน</label>
                    <div>
                        <input type="text" rows="1" class="form-control" name="dump1"></input>
                    </div> <br>
                    <label>ขณะนี้อยู่ระหว่างขอทุนอื่นคือ</label>
                    <div>
                        <input type="text" rows="1" class="form-control" name="dump2"></input>
                    </div> <br>
                    <label>สุขภาพและโรคประจำตัวของผู้สมัคร</label>
                    <div>
                        <input type="text" rows="1" class="form-control" name="dump3"></input>
                    </div> <br>
                    <label>สถานศึกษาที่ผู้สมัครสำเร็จการศึกษาชั้นประถมและมัธยมศึกษา</label>
                    <div>
                        <input type="text" rows="1" class="form-control" name="dump44"></input>
                    </div> <br>
                    <label>กิจกรรมเพื่อส่วนรวมและอื่น ๆ ที่กระทำ</label>
                    <div>
                        <input type="text" rows="1" class="form-control" name="dump22"></input>
                    </div> <br>
                    <label>โครงการหรือความตั้งใจที่จะประกอบอาชีพในอนาคต</label>
                    <div>
                        <input type="text" rows="1" class="form-control" name="dum1p"></input>
                    </div>
                </div>
                <!-- </div> -->

            </div>

            <div class="bigBox">
                <div class="container mt-3">
                    <h2 style="text-align: center;">เอกสารที่นิสิตต้อง Upload</h2> <br>
                    <hr><br>


                    <p>ใบรับรองรายได้ผู้ปกครอง :</p>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="filename1" name="filename1" accept="application/pdf">
                        <label class="custom-file-label" for="filename1">Choose file</label>
                    </div>
                    <p>สำเนาบัตรประตัวนิสิต :</p>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="filename2" name="filename2" accept="application/pdf">
                        <label class="custom-file-label" for="filename2">Choose file</label>
                    </div>
                    <p>ใบรายงานผลการเรียน ณ ปัจจุบัน จาก my ku :</p>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="filename3" name="filename3" accept="application/pdf">
                        <label class="custom-file-label" for="filename3">Choose file</label>
                    </div>
                    <p>ตารางเรียนปีการศึกษา จาก my ku :</p>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="filename4" name="filename4" accept="application/pdf">
                        <label class="custom-file-label" for="filename4">Choose file</label>
                    </div>
                    <p>สำเนาหน้าสมุดบัญชี ทหารไทย ไทยพาณิชย์ ประเภทบัญชีออมทรัพย์ที่นิสิตเป็นเจ้าของ :</p>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="filename5" name="filename5" accept="application/pdf">
                        <label class="custom-file-label" for="filename5">Choose file</label>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                    </div>

                </div>
            </div>
        </form>
        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                console.log(fileName);
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
        <?php
        $req = 0;
        if (isset($_REQUEST['submit'])) {
            $stringToDb = "";
            foreach ($_REQUEST as $key => $value) {
                echo ($value);
                $stringToDb = $stringToDb . '|' . $value;
            }
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
            $sql = "INSERT INTO tunasup( user,parent_path , nisitidcard_path, gpa_path, study_path, bank_path, time, keep) 
                        VALUES ('" . $_SESSION['user'] . "', '$filepaths[0]','$filepaths[1]','$filepaths[2]','$filepaths[3]','$filepaths[4]'," . time() . ",'$stringToDb')";
            $result = $conn->query($sql);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_SESSION['postdata'] = $_POST;
                unset($_POST);
                header("Location: http://localhost/intern/nisit/schoolarShip/successpage.php");
                exit;
            }
            if ($conn->query($sql)) {
                header("Location: http://localhost/intern/nisit/schoolarShip/successpage.php");
    
                echo ('success');
            }else{
                
            }
        }
        ?>



    </div>
    

</body>

</html>