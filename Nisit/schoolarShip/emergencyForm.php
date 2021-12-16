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
    </style>

</head>

<body>
    <?php
    include "../resource/nav.php";
    include "../../connectDb.php"
    ?>
    <div class="bigBox" style="height: fit-content !important;">
        <br>

        <h1 style="text-align: center;">หน้ากรอกการสมัครทุนฉุกเฉิน</h1> <br>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

            <!-- <div class="container mt-5">
                <h2>ส่วนที่ 2 ข้อมูลผู้ปกครอง หรือ ผู้อุปการะนิสิต</h2>
                <h4>ข้อมูล บิดา</h4>
                <div class="form-check pb-3 ">
                    <input class="form-check-input " type="checkbox" value="ข้อมูลบิดาเหมือนที่อยู่ของนิสิต" id="inlineFormCheck" name="22" />
                    <label class="form-check-label " for="inlineFormCheck">
                        ข้อมูลบิดาเหมือนที่อยู่ของนิสิต
                    </label>
                </div>
                ที่อยู่
                <div class="col">
                    <input type="text" class="form-control" placeholder="ที่อยู่" name="23" >
                </div>
                จังหวัด
                <div class="col">
                    <input type="text" class="form-control" placeholder="จังหวัด" name="24">
                </div>
                อำเภอ
                <div class="col">
                    <input type="text" class="form-control" placeholder="อำเภอ" name="25">
                </div>
                ตำบล
                <div class="col">
                    <input type="text" class="form-control" placeholder="ตำบล" name="26">
                </div>
                รหัสไปรษณีย์
                <div class="col pb-4">
                    <input type="text" class="form-control" placeholder="รหัสไปรษณีย์" name="27">
                </div>

                <h4>ข้อมูล มารดา</h4>

                <div class="row pt-1">
                    ชื่อ - สกุล ภาษาไทย
                    <div class="col">
                        <select type="text" class="form-control" placeholder="คำนำหน้า* " id="name" name="28">
                            <option value="นาย">นาย</option>
                            <option value="นาง ">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>
                    </div>
                    <div class="col ">
                        <input type="text" class="form-control" placeholder="ชื่อ " name="29">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="นามสกุล" name="30">
                    </div>
                </div>
                <div class="row pt-2">
                    หมายเลขบัตรประชาชน
                    <div class="col ">
                        <input type="text" class="form-control" placeholder="หมายเลขบัตรประชาชน" name="31">
                    </div>
                    หมายเลขโทรศัพท์
                    <div class="col ">
                        <input type="text" class="form-control" placeholder="อาชีพ " name="32">
                    </div>
                </div>
                <div class="row pt-2">
                    อาชีพ
                    <div class="col">
                        <input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์" name="33">
                    </div>
                </div>

                <h6 class="pt-4">ที่อยู่ซึ่งสามารถติดต่อโดยตรงได้สะดวก</h6>
                <div class="form-check pb-3 ">
                    <input class="form-check-input " type="checkbox" value="ข้อมูลมารดาเหมือนที่อยู่ของนิสิต" id="inlineFormCheck" name="34" />
                    <label class="form-check-label " for="inlineFormCheck">
                        ข้อมูลมารดาเหมือนที่อยู่ของนิสิต
                    </label>
                </div>
                ที่อยู่
                <div class="col">
                    <input type="text" class="form-control" placeholder="ที่อยู่" name="35">
                </div>
                จังหวัด
                <div class="col">
                    <input type="text" class="form-control" placeholder="จังหวัด" name="36">
                </div>
                อำเภอ
                <div class="col">
                    <input type="text" class="form-control" placeholder="อำเภอ" name="37">
                </div>
                ตำบล
                <div class="col">
                    <input type="text" class="form-control" placeholder="ตำบล" name="38">
                </div>
                รหัสไปรษณีย์
                <div class="col pb-4">
                    <input type="text" class="form-control" placeholder="รหัสไปรษณีย์" name="39">
                </div>


            </div> -->
            <div class="container mt-5">
                <h2>ส่วนที่ 3 ผลกระทบจากสถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019</h2>

                <div>
                    <b>ระลอกใหม่ของ บิดา มารดา ผู้ปกครองหรือ ผู้อุปการะของนิสิต </b>
                    <br><br>
                    <div>
                        <input type="checkbox" value="ทำงานประจำ แต่ถูกลดเงินเดือน" id="scales" name="67" checked>
                        <label for="scales">ทำงานประจำ แต่ถูกลดเงินเดือน </label> <input type="text" name="52"> บาท
                    </div>
                    <div>
                        <input type="checkbox" value="ถูกพักงาน" id="horns" name="53">
                        <label for="start">ถูกพักงาน ตั้งแต่วันที่ :</label>
                        <input type="date" id="start" value="2021-10-17" min="2010-10-17" max="2031-12-31" name="54">
                        <label for="start">จนถึง</label>
                        <input type="date" id="start" value="2021-10-17" min="2010-10-17" max="2031-12-31" name="55">
                        รวมเป็นระยะเวลา <input type="text" name="56"> เดือน/ปี
                    </div>
                    <div>
                        <input type="checkbox" value="ถูกเลิกจ้างและอยู่ระหว่างหางานใหม่" id="scales" name="57" checked>
                        <label for="scales">ถูกเลิกจ้างและอยู่ระหว่างหางานใหม่ </label>
                    </div>
                    <div>
                        <input type="checkbox" value="เคยทำอาชีพรับจ้าง" id="scales" name="58" checked>
                        <label for="scales">เคยทำอาชีพรับจ้าง/ อิสระ มีรายได้ </label> <input type="text" name="59"> บาท/เดือน ปัจจุบันไม่มีรายได้
                    </div>
                    <div>
                        <input type="checkbox" value="ทำอาชีพอิสระรายได้ลดลง" id="scales" name="60" checked>
                        <label for="scales"> ทำอาชีพอิสระ รายได้ลดลงจากเดิมประมาณ </label> <input type="text" name="61"> บาท/เดือน
                    </div>
                    <div>
                        <input type="checkbox" value="อื่น ๆ" id="scales" name="62" checked>
                        <label for="scales"> อื่น ๆ (ระบุ) </label> <textarea type="text" rows="3" name="63"></textarea>
                    </div>
                </div><br>
                <div>
                    <b>ผลกระทบจากสถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 ระลอกใหม่ ที่เกิดขึ้นกับตัวนิสิต</b>
                    <br>
                    <br>
                    <div>
                        <input type="checkbox" value="เคยทำงานพิเศษ" id="scales" name="64" checked>
                        <label for="scales">เคยทำงานพิเศษ รายได้เดือนละ </label> <input type="text" name="65"> ปัจจุบันเหลือเดือนละ <input type="text" name="66"> บาท
                    </div>
                    <div>
                        <input type="checkbox" value="เคยมีงานพิเศษทำ" id="scales" name="70" checked>
                        <label for="scales">เคยมีงานพิเศษทำ แต่ปัจจุบันมาสามารถหางานพิเศษได้ (ขอเป็นแบบมีติ๊กเครื่องหมายถูกด้านหน้า)</label>
                    </div>
                    <div>
                        <input type="checkbox" value="อื่น ๆ" id="scales" name="71" checked>
                        <label for="scales"> อื่น ๆ (ระบุ) </label> <textarea type="text" rows="3" name="72"></textarea>
                    </div>
                </div>
                <br>
                <div>
                    <b>สรุปเหตุผลและความจำเป็นที่นิสิตต้องขอรับทุนช่วยเหลือ เนื่องจากได้รับผลจาก สถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่ (สามารถ เลือกหรือแสดงเหตุผลได้มากกว่า 1 ข้อ) </b>
                    <br>
                    <br>
                    <div>
                        <input type="checkbox" value="นิสิตเป็นผู้ได้รับผลกระทบเนื่องจากทำงานหารายได้พิเศษนอกเวลาเรียน และได้รับ ผลกระทบจากสถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่ ทำให้นิสิตถูกเลิกจ้าง หรือถูกพักงาน หรือถูกลดเงินเดือน" id="scales" name="73" checked>
                        <label for="scales">นิสิตเป็นผู้ได้รับผลกระทบเนื่องจากทำงานหารายได้พิเศษนอกเวลาเรียน และได้รับ ผลกระทบจากสถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่ ทำให้นิสิตถูกเลิกจ้าง หรือถูกพักงาน หรือถูกลดเงินเดือน
                        </label>
                    </div>
                    <div>
                        <input type="checkbox" value="ผู้ปกครองหรือผู้อุปการะของนิสิตถูกเลิกจ้าง ซึ่งเป็นผลกระทบจากสถานการณ์แพร่ ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่" id="scales" name="74" checked>
                        <label for="scales">ผู้ปกครองหรือผู้อุปการะของนิสิตถูกเลิกจ้าง ซึ่งเป็นผลกระทบจากสถานการณ์แพร่ ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่
                        </label>
                    </div>
                    <div>
                        <input type="checkbox" value="ผู้ปกครองหรือผู้อุปการะของนิสิตถูกพักงาน ซึ่งเป็นผลกระทบจากสถานการณ์แพร่ ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่" id="scales" name="75" checked>
                        <label for="scales">ผู้ปกครองหรือผู้อุปการะของนิสิตถูกพักงาน ซึ่งเป็นผลกระทบจากสถานการณ์แพร่ ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่
                        </label>
                    </div>
                    <div>
                        <input type="checkbox" value="ผู้ปกครองหรือผู้อุปการะของนิสิตถูกลดเงินเดือน ซึ่งเป็นผลกระทบจากสถานการณ์แพร่ ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่" id="scales" name="76" checked>
                        <label for="scales">ผู้ปกครองหรือผู้อุปการะของนิสิตถูกลดเงินเดือน ซึ่งเป็นผลกระทบจากสถานการณ์แพร่ ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่
                        </label>
                    </div>
                    <div>
                        <input type="checkbox" value="ผู้ปกครองหรือผู้อุปการะของนิสิตรายได้ลดลง ซึ่งเป็นผลกระทบจากสถานการณ์แพร่ ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่" id="scales" name="77" checked>
                        <label for="scales">ผู้ปกครองหรือผู้อุปการะของนิสิตรายได้ลดลง ซึ่งเป็นผลกระทบจากสถานการณ์แพร่ ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่
                        </label>
                    </div>
                    <div>
                        <input type="checkbox" value="ผู้ปกครองหรือผู้อุปการะของนิสิตต้องปิดกิจการหรือต้องหยุดให้บริการชั่วคราว ซึ่งเป็น ผลกระทบจากสถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่" id="scales" name="78" checked>
                        <label for="scales">ผู้ปกครองหรือผู้อุปการะของนิสิตต้องปิดกิจการหรือต้องหยุดให้บริการชั่วคราว ซึ่งเป็น ผลกระทบจากสถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่
                        </label>
                    </div>
                    <div>
                        <input type="checkbox" value="ผู้ปกครองหรือผู้อุปการะของนิสิตได้รับผลกระทบอื่นๆ จากสถานการณ์แพร่ระบาดของ โรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่" id="scales" name="79" checked>
                        <label for="scales"> ผู้ปกครองหรือผู้อุปการะของนิสิตได้รับผลกระทบอื่นๆ จากสถานการณ์แพร่ระบาดของ โรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ระลอกใหม่
                            โปรดระบุผลกระทบ ( ระบุ)
                        </label> <textarea type="text" rows="3" name="80"></textarea>
                    </div>
                </div><br>
                <div>
                    <b>รูปแบบการเข้าสอบสัมภาษณ์ของนิสิต </b>
                    <br>
                    <br>
                    <div>
                        <input type="checkbox" value="ออนไลน์" id="scales" name="81" checked>
                        <label for="scales">ออนไลน์</label>
                    </div>
                    <div>
                        <input type="checkbox" value="สัมภาษณ์ที่คณะวิทยาศาสตร์ศรีราชา" id="scales" name="82" checked>
                        <label for="scales">สัมภาษณ์ที่คณะวิทยาศาสตร์ ศรีราชา </label>
                    </div>
                </div>

            </div>
            <div style="margin-top: auto;">

                <p>จดหมายเล่าประวตส่วนตัว ความจำเป็นที่ต้องขอรับทุนการศึกษา และข้อความบนนยาย ความสนใจและกิจกรรมต่างๆของตนเช่น สาเหตุความจูงใจในการเลือกเรียนวิชาทที่ตนเรียน งานที่จะทำเมื่อสำเร็จการศึกษาแล้ว</p>
                <textarea name="reviews" rows=10 required></textarea><br>

            </div>


            <!-- Modal -->
            <!-- <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">

                                    <div class="modal-content  border-0 pb-2">
                                        <div class="modal-header  border-0 pb-0">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <div class="flex-col-auto"></div>
                                            <div class="col-auto text-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="cross" aria-hidden="true">&times;</span> </button></div>
                                        </div>
                                        <div class="modal-body text-center border-0 pt-3">
                                            <h2><b>ลงทะเบียนสำเร็จ !</b></h2><br>
                                            <p> ตรวจสอบข้อมูลก่อนกดยืนยัน</p>
                                        </div>
                                        <div class="modal-footer justify-content-center border-0 ">
                                            <div class="row justify-content-center">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">ยืนยัน</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> -->
    </div>

    <div class="bigBox">
        <div class="container mt-3">
            <h2 style="text-align: center;">เอกสารที่นิสิตต้อง Upload</h2> <br>
            <hr><br>


            <p>ใบรับรองรายได้ผู้ปกครอง ทฉ.2 :</p>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="filename1" name="filename1" accept="application/pdf">
                <label class="custom-file-label" for="filename1">Choose file</label>
            </div>
            <p>สำเนาบัตรประจำตัวนิสิต(รับรองสำเนาถูกต้อง) :</p>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="filename2" name="filename2" accept="application/pdf">
                <label class="custom-file-label" for="filename2">Choose file</label>
            </div>
            <p>ใบรายงานผลการเรียนจาก my ku :</p>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="filename3" name="filename3" accept="application/pdf">
                <label class="custom-file-label" for="filename3">Choose file</label>
            </div>
            <p>ตารางเรียน :</p>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="filename4" name="filename4" accept="application/pdf">
                <label class="custom-file-label" for="filename4">Choose file</label>
            </div>
            <p>สำเนาหน้าสมุดบัญชี ทหารไทย ไทยพาณิชย์ ประเภทบัญชีออมทรัพย์ที่นิสิตเป็นเจ้าของ :</p>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="filename5" name="filename5" accept="application/pdf">
                <label class="custom-file-label" for="filename5">Choose file</label>
            </div>
            <p>สำเนาบัตรประจำตัวผู้รับรอง(รับรองสำเนาถูกต้อง) :</p>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="filename6" name="filename6" accept="application/pdf">
                <label class="custom-file-label" for="filename6">Choose file</label>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
            </div>
            <script>
                // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    console.log(fileName);
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            </script>
        </div>
    </div>
    </form>
    <?php
    $req = 0;
    if (isset($_REQUEST['submit'])) {
        $stringToDb = "";
        foreach ($_POST as $key => $value) {
            echo ($value);
            $stringToDb = $stringToDb . '|' . $value;
        }
        print_r($stringToDb);

        $sql = "INSERT INTO formtemp (tunname,user, keep)
                  VALUES ('emergency','" . $_SESSION['user'] . "', '$stringToDb')";

        
        $filepaths = [];
        echo ('<pre>');
        $i = 1;
        $target_dir = "C:/xampp/htdocs/Intern/uploadFIle/emergency/";
        for ($i = 1; $i != 7; $i++) {
            $vaild = false;
            $spl = new SplFileInfo($_FILES["filename$i"]['name']);
            $file_parts = pathinfo($spl);

            if ($_FILES["filename$i"]['name'] != "") {

                if ($i == 1 && $file_parts['extension'] == 'pdf') {
                    $name = "ใบรับรองรายได้ผู้ปกครอง";
                    $vaild = true;
                } elseif ($i == 2 && $file_parts['extension'] == 'pdf') {
                    $name = "สำเนาบัตรประจำตัวนิสิต";
                    $vaild = true;
                } elseif ($i == 3 && $file_parts['extension'] == 'pdf') {
                    $name = "ใบรายงานผลการเรียน";
                    $vaild = true;
                } elseif ($i == 4 && $file_parts['extension'] == 'pdf') {
                    $name = "ตารางเรียน";
                    $vaild = true;
                } elseif ($i == 5 && $file_parts['extension'] == 'pdf') {
                    $name = "สำเนาหน้าสมุดบัญชี";
                    $vaild = true;
                } elseif ($i == 6 && $file_parts['extension'] == 'pdf') {
                    $name = "สำเนาบัตรประจำตัวผู้รับรอง";
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
        $sql = "INSERT INTO emergency( user,parent_path, nisitidcard_path, gpa_path, study_path, bank_path,parentid_path, time, keep) 
                    VALUES ('" . $_SESSION['user'] . "', '$filepaths[0]','$filepaths[1]','$filepaths[2]','$filepaths[3]','$filepaths[4]','$filepaths[5]'," . time() . ",'$stringToDb')";
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
        }
    }
    ?>
    </div>

</body>

</html>