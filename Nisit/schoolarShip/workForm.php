<?php
error_reporting(0);
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

        .checkboktec {
            display: block;
            margin-left: 30px;
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <?php
    include "../resource/navIndex.php";
    include "../../connectDb.php"
    ?>

    <div class="bigBox" style="height: fit-content !important;">
        <br>

        <h1 style="text-align: center;">หน้ากรอกการสมัครทุนช่วยงานอาจารย์</h1> <br>
        <hr>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

            <div class="container mt-3">
                <div class="container1">
                    <h2>ส่วนที่ 1 ข้อมูลอาจารย์</h2>
                    <div class="row pt-2">
                        <div class="col"><label for="advisor">คำนำหน้า</label>
                            <select type="text" class="form-control" placeholder="คำนำหน้า* " name="asdwzcw" id="advisor">
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                        <div class="col "><label for="advisorname">ชื่อ อาจารย์ </label>
                            <input type="text" class="form-control" placeholder="ชื่อ " name="aswazxcd">
                        </div>
                        <div class="col"><label for="advisorlastname">นามสกุล อาจารย์ </label>
                            <input type="text" class="form-control" placeholder="นามสกุล" name="advisoerlastname">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col "><label for="advisortel">เบอร์โทรอาจารย์ที่ปรึกษา</label>
                            <input type="text" class="form-control" placeholder="เบอร์โทรอาจารย์ที่ปรึกษา " name="adv2isortel">
                        </div>

                        <div class="col "><label for="advisorstate">ตำแหน่ง</label>
                            <input type="text" class="form-control" placeholder="ตำแหน่ง " name="advaisorstate">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col"><label for="advisorAcademicpos">ตำแหน่งทางวิชาการ</label>
                            <input type="text" class="form-control" placeholder="ตำแหน่งทางวิชาการ" name="advisorAcademicpos">
                        </div>
                        <div class="col"><label for="Affiliation">สังกัด/หลักสูตร</label>
                            <input type="text" class="form-control" placeholder="สังกัด/หลักสูตร" name="Affiliation">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col"><label for="Affiliation">ภาควิชา</label>
                            <input type="text" class="form-control" placeholder="ภาควิชา" name="stext">
                        </div>
                        <div class="col"><label for="Affiliation">Email</label>
                            <input type="text" class="form-control" placeholder="email" name="zemail">
                        </div>
                    </div>
                    <br>

                    <b>ภาระงานสอนอาจารย์</b>
                    <br>
                    <div class="checkboktec">
                        <!-- <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="asdasasddawzxc"> -->
                        <label class="form-check-label" for="flexCheckDefault">
                            ปีการศึกษา 2563 ที่ผ่านมาจำนวน <input type="text" name="ชั่วโมงการทำงาน/ สัปดาห์/ภาคเรียนการศึกษา"> ชั่วโมงการทำงาน/ สัปดาห์/ภาคเรียนการศึกษา
                        </label>
                        <br>
                        <!-- <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="asdasda123ezxc"> -->
                        <label class="form-check-label" for="flexCheckDefault">
                            ปีการศึกษา 2564 ที่ผ่านมาจำนวน <input type="text" name="ชั่วโมงการทำงาน/ สัปดาห์/ภาคเรียนการศึกษา22"> ชั่วโมงการทำงาน/ สัปดาห์/ภาคเรียนการศึกษา
                        </label>
                    </div>

                    <br>
                    <div>
                        <b>ไม่มีประวัติการส่งผลการเรียนล่าช้าเกินระยะเวลาที่กำหนด</b>
                        <br>
                        <div class="checkboktec">
                            <!-- <input class="form-check-input" type="checkbox" name="asdasdawzxczcxzxczxc"  id="flexCheckDefault"><label for="Affiliation"> ระบุรายละเอียดภาระงานที่จะมอบให้นิสิต</label> -->
                            <textarea name="asdasdadawdadxvxawzxc" type="text" rows="3" name="ชั่วโมงการทำงาน/ สัปดาห์/ภาคเรียนการศึกษา33"></textarea>
                        </div>
                    </div>

                    <br>
                    <h2>ส่วนที่ 2 ข้อมูลนิสิตช่วยงาน</h2>

                    <div class="row pt-2">
                        <div class="col "><label for="advisorname">user นิสิต</label>
                            <input type="text" class="form-control" placeholder="นิสิต " name="importantusername">
                        </div>
                        <div class="col"><label for="advisorname">เบอร์โทร</label>
                            <input type="text" class="form-control" placeholder="เบอร์โทร" name="zclastname">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col "><label for="advisorname">รหัสประจำตัวนิสิต </label>
                            <input type="text" class="form-control" placeholder="เลขประจำตัวนิสิต " name="qname">
                        </div>
                        <div class="col "><label for="advisorname">การศึกษา </label>
                            <input type="text" class="form-control" placeholder="การศึกษา " name="eqname">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col "><label for="advisorname">คณะ </label>
                            <input type="text" class="form-control" placeholder="คณะ " name="nasdame">
                        </div>
                        <div class="col"><label for="advisorname">สาขา </label>
                            <select type="text" class="form-control" placeholder="สาขา* " name="asdadsasdawdawdawdasdawzxc" id="name">
                                <option value="สาขาวิชาวิทยาศาสตร์และเทคโนโลยีสิ่งแวดล้อม">สาขาวิชาวิทยาศาสตร์และเทคโนโลยีสิ่งแวดล้อม</option>
                                <option value="สาขาวิชาวิทยาการคอมพิวเตอร์">สาขาวิชาวิทยาการคอมพิวเตอร์</option>
                                <option value="สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม">สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม</option>
                                <option value="สาขาวิชาเทคโนโลยีสารสนเทศ">สาขาวิชาเทคโนโลยีสารสนเทศ</option>
                                <option value="สาขาวิชาเคมี">สาขาวิชาเคมี</option>
                                <option value="สาขาคณิตศาสตร์ประยุกต์">สาขาคณิตศาสตร์ประยุกต์</option>
                                <option value="สาขาฟิสิกส์">สาขาฟิสิกส์</option>
                            </select>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col"><label for="ชั้นปี">สาขา </label>
                            <select type="text" class="form-control" placeholder="ชั้นปี* " name="asdadawdzxcbjujwzxc" id="name">
                                <option value="ปี 1">ปี 1</option>
                                <option value="ปี 2">ปี 2</option>
                                <option value="ปี 3">ปี 3</option>
                                <option value="ปี 4">ปี 4</option>
                            </select>
                        </div>
                        <div class="col "><label for="nzxcame">คะแนนเฉลี่ยสะสม </label>
                            <input type="text" class="form-control" placeholder="คะแนนเฉลี่ยสะสม " name="nzaaxcame">
                        </div>
                    </div>
                    <br>
                    <div>
                        <b>ที่อยู่ปัจจุบัน ซึ่งสามารถติดต่อได้</b>
                        <br> <br>
                        <div class="col"><label for="locaton"> ที่อยู่</label>
                            <input type="text" class="form-control" placeholder="ที่อยู่" name="locaaton">
                        </div>
                        <div class="col"><label for="province"> จังหวัด</label>
                            <input type="text" class="form-control" placeholder="จังหวัด" name="proavince">
                        </div>
                        <div class="col"><label for="district"> อำเภอ</label>
                            <input type="text" class="form-control" placeholder="อำเภอ" name="distarict">
                        </div>
                        <div class="col"><label for="parish"> ตำบล</label>
                            <input type="text" class="form-control" placeholder="ตำบล" name="pariash">
                        </div>
                        <div class="col pb-4"><label for="postcode"> รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" placeholder="รหัสไปรษณีย์" name="postacode">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col "><label for="tel">โทรศัพท์ </label>
                            <input type="text" class="form-control" placeholder="โทรศัพท์" name="tewl">
                        </div>
                        <div class="col"><label for="email">email </label>
                            <input type="text" class="form-control" placeholder="email" name="emaiel">
                        </div>
                        <div class="col"><label for="line">line </label>
                            <input type="text" class="form-control" placeholder="line" name="lzine">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"><label for="name">อาจารย์ที่ปรึกษา </label>
                            <select type="text" class="form-control" placeholder="คำนำหน้า* " id="name" name="awdawda2d3f">
                                <option value="นาย ">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                        <div class="col"><label for="namaae">ชื่ออาจารย์ที่ปรึกษา</label>
                            <input type="text" class="form-control" placeholder="ชื่ออาจารย์ที่ปรึกษา " name="namaae">
                        </div>
                        <div class="col"><label for="lastzz2name">นามสกุลอาจารย์ที่ปรึกษา</label>
                            <input type="text" class="form-control" placeholder="นามสกุลอาจารย์ที่ปรึกษา" name="lastzz2name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col "><label for="naasd2me">เบอร์โทรอาจารย์ที่ปรึกษา</label>
                            <input type="text" class="form-control" placeholder="เบอร์โทรอาจารย์ที่ปรึกษา " name="naasd2me">
                        </div>
                        <div class="col"><label for="emailteach">Emailอาจารย์ที่ปรึกษา</label>
                            <input type="text" class="form-control" placeholder="Emailอาจารย์ที่ปรึกษา" name="emailteach">
                        </div>
                    </div>

                    <!-- <div><br>
                        <b>เอกสารของนิสิตเพื่อประกอบการพิจารณา </b>
                        <br>
                        <br>
                        <div>
                            <label for="scales">สำเนาบัตรประจำตัวนิสิต รับรองสำเนาถูกต้อง</label><input type="file" name="fileToUpload1" id="fileToUpload"> <br>

                        </div>
                        <div>
                            <label for="scales"> สำเนาใบรายงานผลการเรียน รับรองสำเนาถูกต้อง </label><input type="file" name="fileToUpload2" id="fileToUpload"> <br>

                        </div>
                        <div>
                            <label for="scales"> สำเนาตารางเรียนนิสิต ปัจจุบัน รับรองสำเนาถูกต้อง </label><input type="file" name="fileToUpload3" id="fileToUpload"> <br>

                        </div>
                    </div> -->
                </div>
            </div>
            <div class="container mt-3">
                <h2 style="text-align: center;">เอกสารที่นิสิตต้อง Upload</h2> <br>
                <hr><br>

                <p>สำเนาบัตรประจำตัวนิสิต (รับรองสำเนาถูกต้อง) :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="filename1" name="filename1" require accept="application/pdf">
                    <label class="custom-file-label" for="filename1">Choose file</label>
                </div>
                <p>ใบรายงานผลการเรียน ณ ปัจจุบัน จาก my ku (ยกเว้นนิสิตชั้นปีที่ 1 ) :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="filename2" name="filename2" require accept="application/pdf">
                    <label class="custom-file-label" for="filename2">Choose file</label>
                </div>
                <p>ตารางเรียนปีการศึกษา :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="filename3" name="filename3" require accept="application/pdf">
                    <label class="custom-file-label" for="filename3">Choose file</label>
                </div>
                <p>สำเนาหน้าสมุดบัญชี ทหารไทย ไทยพาณิชย์ ประเภทบัญชีออมทรัพย์ที่นิสิตเป็นเจ้าของ :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="filename4" name="filename4" require accept="application/pdf">
                    <label class="custom-file-label" for="filename4">Choose file</label>
                </div>
                <div class="register">
                    <button type="submit" name="submit" class="btn btn-primary" data-toggle="" data-target="" data-backdrop="static" data-keyboard="false">
                        subbmit
                    </button>
                </div>
                <script>
                    // Add the following code if you want the name of the file appear on select
                    $(".custom-file-input").on("change", function() {
                        var fileName = $(this).val().split("\\").pop();
                        console.log(fileName);
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    });
                </script>
                <script>
                    function myFunction() {


                        var x = document.getElementById("filename1").required = "true";
                        document.getElementById("filename1").innerHTML = x;
                        var x = document.getElementById("filename2").required = "true";
                        document.getElementById("filename2").innerHTML = x;
                        var x = document.getElementById("filename3").required = "true";
                        document.getElementById("filename3").innerHTML = x;
                        var x = document.getElementById("filename4").required = "true";
                        document.getElementById("filename4").innerHTML = x;
                        var x = document.getElementById("filename5").required = "true";
                        document.getElementById("filename5").innerHTML = x;
                    }
                </script>

            </div>

        </form>
    </div>

    <?php
    $req = 0;
    if (isset($_REQUEST['submit'])) {
        $stringToDb = "";
        foreach ($_POST as $key => $value) {
            echo ($value);
            $stringToDb = $stringToDb . '|' . $value;
        }
        print_r($stringToDb);


        $filepaths = [];
        // echo ('<pre>');
        $i = 1;
        $target_dir = "C:/xampp/htdocs/Intern/uploadFIle/work/";
        for ($i = 1; $i != 5; $i++) {

            $vaild = false;
            $spl = new SplFileInfo($_FILES["filename$i"]['name']);
            $file_parts = pathinfo($spl);

            if ($_FILES["filename$i"]['name'] != "") {

                if ($i == 1 && $file_parts['extension'] == 'pdf') {
                    $name = "สำเนาบัตรประจำตัวนิสิต";
                    $vaild = true;
                } elseif ($i == 2 && $file_parts['extension'] == 'pdf') {
                    $name = "ใบรายงานผลการเรียน";
                    $vaild = true;
                } elseif ($i == 3 && $file_parts['extension'] == 'pdf') {
                    $name = "ตารางเรียนปีการศึกษา";
                    $vaild = true;
                } elseif ($i == 4 && $file_parts['extension'] == 'pdf') {
                    $name = "สำเนาหน้าสมุดบัญชี";
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
        foreach ($filepaths as $f) {
            // echo ('<br>');
        }
        // $sqls = "INSERT INTO formtemp (tunname,user, keep)
        //              VALUES ('work','" . $_SESSION['user'] . "', '$stringToDb')";

        // if ($conn->query($sqls)) {
        //     // header("Location: http://localhost/intern/nisit/schoolarShip/successpage.php");

        //     echo ('success');
        // } else {
        //     print_r('fail');
        // }
        $sql = "INSERT INTO work( user, nisitidcard_path, gpa_path, study_path, bank_path, time,keep) 
                     VALUES ('" . $_REQUEST['importantusername'] . "', '$filepaths[0]','$filepaths[1]','$filepaths[2]','$filepaths[3]'," . time() . ",'$stringToDb')";
        $result = $conn->query($sql);
        if ($result) {
            header("Location: http://localhost/intern/nisit/schoolarShip/successpage.php");
        } else {
            echo ("fail");
        }
    }
    ?>


</body>

</html>