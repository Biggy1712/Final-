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
                <h2>ข้อมูลทั่วไปของนิสิต</h2>
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
                </div>
                <h2>ส่วนที่ 1 ข้อมูลนิสิต</h2>
                <div class="container1">
                    <div class="row pt-2">

                        <div class="col">
                            <label for="thaiprename"> คำนำหน้า </label>
                            <select type="text" class="form-control" placeholder="คำนำหน้า* " id="name" name="thaiprename" require>
                                <option value="Mr./Mr ">นาย</option>
                                <option value="Mrs./Mrs ">นาง</option>
                                <option value="Miss">นางสาว</option>
                                <option value="All">อื่นๆ</option>
                            </select>
                            <small>กรุณาระบุ</small>
                        </div>
                        <div class="col ">
                            <label for="name"> ชื่อ ภาษาไทย </label>
                            <input type="text" for="validationCustom01" class="form-control" placeholder="ชื่อ " name="thainame" require>
                            <small>กรุณาระบุ</small>
                        </div>
                        <div class="col">
                            <label for="thaisurname"> สกุล ภาษาไทย </label>
                            <input type="text" class="form-control" placeholder="นามสกุล" name="thaisurname" require>
                            <small>กรุณาระบุ</small>
                        </div>
                    </div>
                    <div class="row pt-2">

                        <div class="col">
                            <label for="engprename"> คำนำหน้า </label>
                            <select type="text" class="form-control" placeholder="คำนำหน้า* " id="name" name="engprename" require>
                                <option value="Mr./Mr ">Mr./Mr</option>
                                <option value="Mrs./Mrs ">Mrs./Mrs </option>
                                <option value="Miss">Miss</option>
                                <option value="All">All</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="engname"> ชื่อ ภาษาอังกฤษ </label>
                            <input type="text" class="form-control" placeholder="name " name="engname" require>
                        </div>
                        <div class="col">
                            <label for="engsurname"> สกุล ภาษาอังกฤษ </label>
                            <input type="text" class="form-control" placeholder="lastname" name="engsurname" require>
                        </div>
                    </div>
                    <div class="row pt-2">

                        <div class="col ">
                            <label for="nisitid"> รหัสประจำตัวนิสิต</label>
                            <input type="text" class="form-control" placeholder="รหัสประจำตัวนิสิต " name="nisitid" require>
                        </div>

                        <div class="col">
                            <label for="year"> ชั้นปี</label>
                            <select type="text" class="form-control" placeholder="คำนำหน้า* " id="name" name="year" require>
                                <option value="ปี 1">ปี 1</option>
                                <option value="ปี 2">ปี 2</option>
                                <option value="ปี 3">ปี 3</option>
                                <option value="ปี 4">ปี 4</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="sec"> สาขา</label>
                            <select type="text" class="form-control" placeholder="สาขา* " id="name" name="sec" require>
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
                        <div class="col">
                            <label for="email"> Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email" require>
                        </div>
                        <div class="col">
                            <label for="line"> ID Line</label>
                            <input type="text" class="form-control" placeholder="Line" name="line" require>
                        </div>
                        <div class="col">
                            <label for="tel">หมายเลขโทรศัพท์</label>
                            <input type="tel" class="form-control" placeholder="หมายเลขโทรศัพท์" name="tel" require>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col ">
                            <label for="gpa">คะแนนเฉลี่ยสะสม</label>
                            <input type="text" class="form-control" placeholder="คะแนนเฉลี่ยสะสม " name="gpa">
                        </div>

                        <div class="col ">
                            <label for="birth">เกิดวันที่</label>
                            <input type="date" id="start" name="tasdrip-start" value="2021-10-25" min="1990-10-17" max="2031-12-31">
                        </div>

                        <div class="col ">
                            <label for="age"> อายุ</label>
                            <input type="number" class="form-control" placeholder="อายุ" name="age">
                        </div>
                    </div>
                    <div>
                        <b>ภูมิลำเนาบ้าน</b>
                        <br>
                        <div class="col"><label for="locaton"> ที่อยู่</label>
                            <input type="text" class="form-control" placeholder="ที่อยู่" name="loczxczxcaasdton">
                        </div>
                        <div class="col"><label for="province"> จังหวัด</label>
                            <input type="text" class="form-control" placeholder="จังหวัด" name="provazxczxcsdasdince">
                        </div>
                        <div class="col"><label for="district"> อำเภอ</label>
                            <input type="text" class="form-control" placeholder="อำเภอ" name="disaszxczxczxcdasdtrict">
                        </div>
                        <div class="col"><label for="parish"> ตำบล</label>
                            <input type="text" class="form-control" placeholder="ตำบล" name="pariazxczxczxczsdasdsh">
                        </div>
                        <div class="col pb-4"><label for="postcode"> รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" placeholder="รหัสไปรษณีย์" name="poxczxczxcstcasdasdode">
                        </div>
                    </div>
                    <div>
                        <b>ที่อยู่ ซึ่งสามารถติดต่อโดยตรงได้สะดวก </b>
                        <br>
                        <div class="col"><label for="locaton"> ที่อยู่</label>
                            <input type="text" class="form-control" placeholder="ที่อยู่" name="locaasdzxczxcton">
                        </div>
                        <div class="col"><label for="province"> จังหวัด</label>
                            <input type="text" class="form-control" placeholder="จังหวัด" name="provasdasdasdzxczxczince">
                        </div>
                        <div class="col"><label for="district"> อำเภอ</label>
                            <input type="text" class="form-control" placeholder="อำเภอ" name="distrxasdasdczxczxict">
                        </div>
                        <div class="col"><label for="parish"> ตำบล</label>
                            <input type="text" class="form-control" placeholder="ตำบล" name="pariczasdasdaxczxcsh">
                        </div>
                        <div class="col pb-4"><label for="postcode"> รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" placeholder="รหัสไปรษณีย์" name="postsdasdzxcczxcode">
                        </div>
                    </div>
                </div>
                <h2>ส่วนที่ 2 ข้อมูลผู้ปกครอง หรือ ผู้อุปการะนิสิต</h2>
                <div class="container1">
                    <h4>ข้อมูล บิดา</h4>
                    <div class="row pt-1">
                        <div class="col">
                            <label for="nameprefixdad"> คำนำหน้า</label>
                            <select type="text" class="form-control" placeholder="คำนำหน้า* " id="nameprefixdad" name="asdaosdoaskdoaskdokok">
                                <option value="นาย">นาย</option>
                                <option value="นาง ">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                        <div class="col ">
                            <label for="dadname"> ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อ " name="dadxcvxcvname">
                        </div>
                        <div class="col">
                            <label for="dadlastname"> นามสกุล</label>
                            <input type="text" class="form-control" placeholder="นามสกุล" name="dadlaxcvxcvxstname">
                        </div>

                    </div>
                    <div class="row pt-2">
                        <div class="col "><label for="dadbirth"> วันเกิด</label>
                            <input type="date" id="start" name="t123arip-stxcvxcart" value="2021-10-18" min="1950-10-17" max="2031-12-31">
                        </div>
                        <div class="col "><label for="dadjob"> อาชีพ</label>
                            <input type="text" class="form-control" placeholder="อาชีพ" name="dadjxcvxcvxob">
                        </div>

                        <div class="col "><label for="dadworkplacee"> สถานที่ประกอบอาชีพ</label>
                            <input type="text" class="form-control" placeholder="สถานที่ประกอบอาชีพ" name="workplacvxcvxcce">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col"><label for="dadincome"> รายได้เดือนละ</label>
                            <input type="text" class="form-control" placeholder="รายได้เดือนละ" name="dadinvxcvcome">
                        </div>
                        <div class="col "><label for="dadIDcard"> หมายเลขบัตรประชาชน</label>
                            <input type="number" class="form-control" placeholder="หมายเลขบัตรประชาชน" name="dadIxcvxcvDcard">
                        </div>

                        <div class="col "><label for="dadtel"> หมายเลขโทรศัพท์</label>
                            <input type="tel" class="form-control" placeholder="หมายเลขโทรศัพท์ " name="dsdvsadtel">
                        </div>
                    </div><br>

                    <h4>ข้อมูล มารดา</h4>
                    <div class="row pt-1">
                        <div class="col">
                            <label for="momnameprefix"> คำนำหน้า</label>
                            <select type="text" class="form-control" placeholder="คำนำหน้า* " id="nameprefixmom" name="asdadoaskdoaksdoakdo">
                                <option value="นาย">นาย</option>
                                <option value="นาง ">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                        <div class="col ">
                            <label for="momname"> ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อ " name="momnsdvsdvsdame">
                        </div>
                        <div class="col">
                            <label for="momlastname"> นามสกุล</label>
                            <input type="text" class="form-control" placeholder="นามสกุล" name="momlasvsdvsdvtname">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col "><label for="mombirth"> วันเกิด</label>
                            <input type="date" id="start" name="t123arip-stasdvdsfdfsdfsewrrrwewreart" value="2021-10-18" min="1950-10-17" max="2031-12-31">
                        </div>
                        <div class="col "><label for="momjob"> อาชีพ</label>
                            <input type="text" class="form-control" placeholder="อาชีพ" name="momaqwqwejob">
                        </div>

                        <div class="col "><label for="momworkplacee"> สถานที่ประกอบอาชีพ</label>
                            <input type="text" class="form-control" placeholder="สถานที่ประกอบอาชีพ" name="worqwqwekplace">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col"><label for="momincome"> รายได้เดือนละ</label>
                            <input type="text" class="form-control" placeholder="รายได้เดือนละ" name="moqweqwemincome">
                        </div>
                        <div class="col "><label for="momIDcard"> หมายเลขบัตรประชาชน</label>
                            <input type="number" class="form-control" placeholder="หมายเลขบัตรประชาชน" name="momIqweqweDcard">
                        </div>

                        <div class="col "><label for="momtel"> หมายเลขโทรศัพท์</label>
                            <input type="tel" class="form-control" placeholder="หมายเลขโทรศัพท์ " name="moqweqweqweqwemtel">
                        </div>
                    </div><br>
                    <br>

                    <h4>ข้อมูล ผู้อุปการะนิสิต </h4>
                    <div class="row pt-1">
                        <div class="col">
                            <label for="nameprefixkin"> คำนำหน้า</label>
                            <select type="text" class="form-control" placeholder="คำนำหน้า* " id="nameprefixkin" name="asdasdqweqweqwe">
                                <option value="นาย">นาย</option>
                                <option value="นาง ">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                        <div class="col ">
                            <label for="kinname"> ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อ " name="kinnqweqweqweame">
                        </div>
                        <div class="col">
                            <label for="kinlastname"> นามสกุล</label>
                            <input type="text" class="form-control" placeholder="นามสกุล" name="kinlastnqweqweqweame">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col "><label for="kinbirth"> วันเกิด</label>
                            <input type="date" id="start" name="t123aqweqweqweqwerip-start" value="2021-10-18" min="1950-10-17" max="2031-12-31">
                        </div>
                        <div class="col "><label for="kinjob"> อาชีพ</label>
                            <input type="text" class="form-control" placeholder="อาชีพ" name="kinjoqweqweqweb">
                        </div>

                        <div class="col "><label for="kinworkplacee"> สถานที่ประกอบอาชีพ</label>
                            <input type="text" class="form-control" placeholder="สถานที่ประกอบอาชีพ" name="workplqweqweqweace">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col"><label for="kinincome"> รายได้เดือนละ</label>
                            <input type="text" class="form-control" placeholder="รายได้เดือนละ" name="kinqweqweqweincome">
                        </div>
                        <div class="col "><label for="kinIDcard"> หมายเลขบัตรประชาชน</label>
                            <input type="number" class="form-control" placeholder="หมายเลขบัตรประชาชน" name="kinIDcaqweqeqweqwerd">
                        </div>

                        <div class="col "><label for="kintel"> หมายเลขโทรศัพท์</label>
                            <input type="tel" class="form-control" placeholder="หมายเลขโทรศัพท์ " name="ksdfsdfsdfsdfintel">
                        </div>
                    </div><br>

                    <h4>สภาวะของบิดามารดา</h4>
                    <div class="form-check pb-3 ">
                        <input class="form-check-input " value="อยู่ด้วยกัน" type="checkbox" id="inlineFormCheck" name="asdasdqweqwe" />
                        <label class="form-check-label " for="inlineFormCheck"> อยู่ด้วยกัน </label><br>
                        <input class="form-check-input " value="แยกกันอยู่" type="checkbox" id="inlineFormCheck" name="asdasdadawzzxc" />
                        <label class="form-check-label " for="inlineFormCheck"> แยกกันอยู่ </label><br>
                        <input class="form-check-input " value="อื่นๆ" type="checkbox" id="inlineFormCheck" name="asdawdaxpa" />
                        <label class="form-check-label " for="inlineFormCheck"> อื่นๆ(ระบุ) <input type="text"> </label>
                    </div>
                </div>
                <h2>ส่วนที่ 3 มีพี่น้องร่วมบิดามารดา และระดับการศึกษา</h2>
                <div class="container1">
                    <div class="form-check ">
                        <input class="form-check-input " value="ไม่มีพี่น้องร่วมบิดามารดา" type="checkbox" id="inlineFormCheck" name="adqdwq2qd" />
                        <label class="form-check-label " for="inlineFormCheck"> ไม่มีพี่น้องร่วมบิดามารดา</label><br>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input " value="มีพี่น้องร่วมบิดามารดา" type="checkbox" id="inlineFormCheck" name="asd12e1eA" />
                        <label class="form-check-label " for="inlineFormCheck"> มีพี่น้องร่วมบิดามารดา</label><br>
                    </div>
                    <!--my brothers1-->
                    <div>
                        <div class="row pt-2">
                            <div class="col"><label for="prefix1"> 1. คำนำหน้า</label>
                                <select type="text" class="form-control" placeholder="คำนำหน้า* " id="prefix1" name="adawdqawdqazxc">
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                            </div>
                            <div class="col "><label for="name1"> ชื่อ</label>
                                <input type="text" class="form-control" placeholder="ชื่อ " name="nameasdasd1">
                            </div>
                            <div class="col"><label for="lastname1"> นามสกุล</label>
                                <input type="text" class="form-control" placeholder="นามสกุล" name="lastnaasdasdasdame1">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col "><label for="educationlevel1"> ระดับการศึกษา</label>
                                <input type="text" class="form-control" placeholder="ระดับการศึกษา " name="educatsdasdasdasdionlevel1">
                            </div>
                        </div>
                    </div>
                    <!--my brothers2-->
                    <div>
                        <div class="row pt-2">
                            <div class="col"><label for="prefix2"> 2. คำนำหน้า</label>
                                <select type="text" class="form-control" placeholder="คำนำหน้า* " id="prefix2" name="awdawdawdadadw" zxc>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                            </div>
                            <div class="col "><label for="name2"> ชื่อ</label>
                                <input type="text" class="form-control" placeholder="ชื่อ " name="nameasdas2">
                            </div>
                            <div class="col"><label for="lastname2"> นามสกุล</label>
                                <input type="text" class="form-control" placeholder="นามสกุล" name="lastnadasdasdme2">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col "><label for="educationlevel2"> ระดับการศึกษา</label>
                                <input type="text" class="form-control" placeholder="ระดับการศึกษา " name="educasdasdasdasdationlevel2">
                            </div>
                        </div>
                    </div>
                    <!--my brothers3-->
                    <div>
                        <div class="row pt-2">
                            <div class="col"><label for="prefix3"> 3. คำนำหน้า</label>
                                <select type="text" class="form-control" placeholder="คำนำหน้า* " id="prefix3" name="d2d1qdqsd">
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                            </div>
                            <div class="col "><label for="name3"> ชื่อ</label>
                                <input type="text" class="form-control" placeholder="ชื่อ " name="naasdasdasdm1ee12whhe3">
                            </div>
                            <div class="col"><label for="lastname3"> นามสกุล</label>
                                <input type="text" class="form-control" placeholder="นามสกุล" name="lasasdasdtnahjmhjmhjmme3">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col "><label for="educationlevel3"> ระดับการศึกษา</label>
                                <input type="text" class="form-control" placeholder="ระดับการศึกษา " name="eduasdasdasdcahjmhjmhjmhjmtionlevel3">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="p">
                        <p class="account"><br />
                            Already have an account? <a href="http://localhost/intern/nisit/loginNisit.php">Login here</a>
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
                    // check to see if the user successfully created an account
                    // echo'<pre>';
                    if (isset($_REQUEST['submit'])) {

                        $user = $_REQUEST['user'];
                        $pass = $_REQUEST['pass'];
                        $thaiprename = $_REQUEST['thaiprename'];
                        $thainame = $_REQUEST['thainame'];
                        $thaisurname = $_REQUEST['thaisurname'];
                        $engprename = $_REQUEST['engprename'];
                        $engname = $_REQUEST['engname'];
                        $engsurname = $_REQUEST['engsurname'];
                        $nisitid = $_REQUEST['nisitid'];
                        $year = $_REQUEST['year'];
                        $sec = $_REQUEST['sec'];
                        $email = $_REQUEST['email'];
                        $line = $_REQUEST['line'];
                        $tel = $_REQUEST['tel'];

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
                        $sql = "INSERT INTO nisit (user,pass,thaiprename,thainame,name,thaisurname,engprename,engname,engsurname,nisitid,year,sec,email,line,tel,keep) 
                        VALUES ('$user','$pass','$thaiprename','$thainame','$thainame','$thaisurname','$engprename','$engname','$engsurname','$nisitid','$year','$sec','$email','$line','$tel','$stringToDb') ";
                        // WHERE user = '" . $_SESSION['user'] . "'
                        $chechDuplicateUserSQL = "SELECT user FROM nisit where user = '$user' ";

                        $res = $conn->query($chechDuplicateUserSQL);
                        if ($row = $res->fetch_assoc()) {
                            echo ("this user is already register");
                        } else {
                            $conn->query($sql);
                            echo '<hr><p style=" text-align: center;width:80%; margin:auto;" color="green">Yay!! Your account has been created. <a href="http://localhost/intern/nisit/loginNisit.php">Click here</a> to login!<p>';
                        }
                        // $row = $res -> fetch_row();
                        // echo $_SESSION['user'];
                    }
                    // check to see if the error message is set, if so display it
                    else if (isset($error_msg)) {
                        echo '<p color="red">' . $error_msg . '</p>';
                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $_SESSION['postdata'] = $_POST;
                        unset($_POST);
                        header("Location: " . $_SERVER['PHP_SELF']);
                        exit;
                    }
                    ?>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>