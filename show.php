<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http:\\localhost\Intern\Nisit\resource\css.css">
</head>

<body>
    <?php
    error_reporting(0);
    $tunname = $_REQUEST['tunname'];
    $id = $_REQUEST['id'];
    $user = $_REQUEST['user'];
    $time = $_REQUEST['time'];

    include "./connectDb.php";
    include "./Nisit/resource/navIndex.php";

    $sqls = "select * from nisit where user ='$user'";
    $results = $conn->query($sqls);
    while ($rows = $results->fetch_assoc()) {
        $regis = explode("|", $rows['keep']);
        echo "<pre>";
        // print_r($rows);
        // print_r($regis);
        echo "</pre>";
        echo (' 
        <div class="bigBox">
        <div class="container mt-3">
                <h2>ข้อมูลทั่วไปของนิสิต</h2>
                <div class="container1">
                    <div class="row">
                        <div class="col ">
                            รหัสนิสิต : <u>'.$rows['user'].'</u>
                        </div>
                    </div>
                </div>

                <div class="container1">
                    <div class="row pt-2">

                        <div class="col ">
                        ชื่อ : '.$rows['thaiprename'].'   '.$rows['thainame'].'
                        </div>
                        <div class="col">
                        นามสกุล : '.$rows['thaisurname'].'
                        </div>

                    </div>

                        <div class="col ">
                            <label for="nisitid"> รหัสประจำตัวนิสิต</label>
                             : '.$rows['nisitid'].'
                        </div>

                        <div class="col">
                            ชั้นปี  : '.$rows['year'].'
                            
                        </div>
                        <div class="col">
                            <label for="sec"> สาขา</label>
                            : '.$rows['sec'].'
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col">
                            <label for="email"> Email</label>
                            : '.$rows['email'].'
                        </div>
                        <div class="col">
                            <label for="line"> ID Line</label>
                            : '.$rows['line'].'
                        </div>
                        <div class="col">
                            <label for="tel">หมายเลขโทรศัพท์</label>
                            : '.$rows['tel'].'
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col ">
                            <label for="gpa">คะแนนเฉลี่ยสะสม</label>
                            : '.$regis[15].'
                        </div>

                        <div class="col ">
                            <label for="birth">เกิดวันที่</label>
                            : '.$regis[16].'
                        </div>

                        <div class="col ">
                            <label for="age"> อายุ</label>
                            : '.$regis[17].'
                        </div>
                    </div>
                    <div>
                        <b>ภูมิลำเนาบ้าน</b>
                        <br>
                        <div class="col"><label for="locaton"> ที่อยู่</label>
                        : '.$regis[18].'
                        </div>
                        <div class="col"><label for="province"> จังหวัด</label>
                        : '.$regis[19].'
                        </div>
                        <div class="col"><label for="district"> อำเภอ</label>
                        : '.$regis[20].'
                        </div>
                        <div class="col"><label for="parish"> ตำบล</label>
                        : '.$regis[21].'
                        </div>
                        <div class="col pb-4"><label for="postcode"> รหัสไปรษณีย์</label>
                        : '.$regis[22].'
                        </div>
                    </div>
                    <div>
                        <b>ที่อยู่ ซึ่งสามารถติดต่อโดยตรงได้สะดวก </b>
                        <br>
                        <div class="col"><label for="locaton"> ที่อยู่</label>
                        : '.$regis[23].'
                        </div>
                        <div class="col"><label for="province"> จังหวัด</label>
                        : '.$regis[24].'
                        </div>
                        <div class="col"><label for="district"> อำเภอ</label>
                        : '.$regis[25].'
                        </div>
                        <div class="col"><label for="parish"> ตำบล</label>
                        : '.$regis[26].'
                        </div>
                        <div class="col pb-4"><label for="postcode"> รหัสไปรษณีย์</label>
                        : '.$regis[27].'
                        </div>
                    </div>
                
                <hr>
                <h2>ส่วนที่ 2 ข้อมูลผู้ปกครอง หรือ ผู้อุปการะนิสิต</h2>
                <div class="container1">
                    <h4>ข้อมูล บิดา</h4>
                    <div class="row pt-1">
                        <div class="col">
                            <label for="nameprefixdad"> คำนำหน้า</label>
                            : '.$regis[28].'
                        </div>
                        <div class="col ">
                            <label for="dadname"> ชื่อ</label>
                            : '.$regis[29].'
                        </div>
                        <div class="col">
                            <label for="dadlastname"> นามสกุล</label>
                            : '.$regis[30].'
                        </div>

                    </div>
                    <div class="row pt-2">
                        <div class="col "><label for="dadbirth"> วันเกิด</label>
                        : '.$regis[31].'
                        </div>
                        <div class="col "><label for="dadjob"> อาชีพ</label>
                        : '.$regis[32].'
                        </div>

                        <div class="col "><label for="dadworkplacee"> สถานที่ประกอบอาชีพ</label>
                        : '.$regis[33].'
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col"><label for="dadincome"> รายได้เดือนละ</label>
                        : '.$regis[34].'
                        </div>
                        <div class="col "><label for="dadIDcard"> หมายเลขบัตรประชาชน</label>
                        : '.$regis[35].'
                        </div>

                        <div class="col "><label for="dadtel"> หมายเลขโทรศัพท์</label>
                        : '.$regis[36].'
                        </div>
                    </div><br>

                    <h4>ข้อมูล มารดา</h4>
                    <div class="row pt-1">
                        <div class="col">
                            <label for="momnameprefix"> คำนำหน้า</label>
                            : '.$regis[37].'
                        </div>
                        <div class="col ">
                            <label for="momname"> ชื่อ</label>
                            : '.$regis[38].'
                        </div>
                        <div class="col">
                            <label for="momlastname"> นามสกุล</label>
                            : '.$regis[39].'
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col "><label for="mombirth"> วันเกิด</label>
                        : '.$regis[40].'
                        </div>
                        <div class="col "><label for="momjob"> อาชีพ</label>
                        : '.$regis[41].'
                        </div>

                        <div class="col "><label for="momworkplacee"> สถานที่ประกอบอาชีพ</label>
                        : '.$regis[42].'
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col"><label for="momincome"> รายได้เดือนละ</label>
                        : '.$regis[43].'
                        </div>
                        <div class="col "><label for="momIDcard"> หมายเลขบัตรประชาชน</label>
                        : '.$regis[44].'
                        </div>

                        <div class="col "><label for="momtel"> หมายเลขโทรศัพท์</label>
                        : '.$regis[45].'
                        </div>
                    </div><br>
                    <br>

                    <h4>ข้อมูล ผู้อุปการะนิสิต </h4>
                    <div class="row pt-1">
                        <div class="col">
                            <label for="nameprefixkin"> คำนำหน้า</label>
                            : '.$regis[46].'
                        </div>
                        <div class="col ">
                            <label for="kinname"> ชื่อ</label>
                            : '.$regis[47].'
                        </div>
                        <div class="col">
                            <label for="kinlastname"> นามสกุล</label>
                            : '.$regis[48].'
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col "><label for="kinbirth"> วันเกิด</label>
                        : '.$regis[49].'
                        </div>
                        <div class="col "><label for="kinjob"> อาชีพ</label>
                        : '.$regis[50].'
                        </div>

                        <div class="col "><label for="kinworkplacee"> สถานที่ประกอบอาชีพ</label>
                        : '.$regis[51].'
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col"><label for="kinincome"> รายได้เดือนละ</label>
                        : '.$regis[52].'
                        </div>
                        <div class="col "><label for="kinIDcard"> หมายเลขบัตรประชาชน</label>
                        : '.$regis[53].'
                        </div>

                        <div class="col "><label for="kintel"> หมายเลขโทรศัพท์</label>
                        : '.$regis[54].'
                        </div>
                    </div><br>
                
                    <h4>สภาวะของบิดามารดา</h4>
                    <div class="form-check pb-3 ">
                        : '.$regis[55].'
                       <br>
                        : '.$regis[56].'
                        <br>
                        : '.$regis[57].'
                    </div>
                </div>
                <h2>ส่วนที่ 3 มีพี่น้องร่วมบิดามารดา และระดับการศึกษา</h2>
                <div class="container1">
                   
                        : '.$regis[58].'
                       <br>
                   
                 
                        : '.$regis[59].'
                     <br>
                   
                    <!--my brothers1-->
                    <div>
                        <div class="row pt-2">
                            <div class="col"><label for="prefix1"> 1. คำนำหน้า</label>
                            : '.$regis[60].'
                            </div>
                            <div class="col "><label for="name1"> ชื่อ</label>
                            : '.$regis[61].'
                            </div>
                            <div class="col"><label for="lastname1"> นามสกุล</label>
                            : '.$regis[62].'
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col "><label for="educationlevel1"> ระดับการศึกษา</label>
                            : '.$regis[63].'
                            </div>
                        </div>
                    </div>
                    <!--my brothers2-->
                    <div>
                        <div class="row pt-2">
                            <div class="col"><label for="prefix2"> 2. คำนำหน้า</label>
                            : '.$regis[64].'
                            </div>
                            <div class="col "><label for="name2"> ชื่อ</label>
                            : '.$regis[65].'
                            </div>
                            <div class="col"><label for="lastname2"> นามสกุล</label>
                            : '.$regis[66].'
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col "><label for="educationlevel2"> ระดับการศึกษา</label>
                            : '.$regis[67].'
                            </div>
                        </div>
                    </div>
                    <!--my brothers3-->
                    <div>
                        <div class="row pt-2">
                            <div class="col"><label for="prefix3"> 3. คำนำหน้า</label>
                            : '.$regis[68].'
                            </div>
                            <div class="col "><label for="name3"> ชื่อ</label>
                            : '.$regis[69].'
                            </div>
                            <div class="col"><label for="lastname3"> นามสกุล</label>
                            : '.$regis[70].'
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col "><label for="educationlevel3"> ระดับการศึกษา</label>
                            : '.$regis[71].'
                            </div>
                        </div>
                    </div>
                    <br>
                    
            ');



    }

    $sql = "select keep from $tunname where id = $id and user='$user' and time = '$time' ";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $master = explode("|", $row['keep']);
        // print_r($master);
        if ($tunname == 'work') {
            echo ('
                <div class="container mt-3">
                    <div class="container1">
                        <h2>ข้อมูลอาจารย์</h2>
                        <div class="row pt-2">
                            <div class="col"><label for="advisor">คำนำหน้า</label>
                                <p><u>' . $master[1] . '</u></p>
                            </div>
                            <div class="col "><label for="advisorname">ชื่อ อาจารย์ </label>
                                <p><u>' . $master[2] . '</u></p>
                            </div>
                            <div class="col"><label for="advisorlastname">นามสกุล อาจารย์ </label>
                                <p><u>' . $master[3] . '</u></p>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col "><label for="advisortel">เบอร์โทรอาจารย์ที่ปรึกษา</label>
                                <p><u>' . $master[4] . '</u></p>
                            </div>

                            <div class="col "><label for="advisorstate">ตำแหน่ง</label>
                                <p><u>' . $master[5] . '</u></p>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col"><label for="advisorAcademicpos">ตำแหน่งทางวิชาการ</label>
                                <p><u>' . $master[6] . '</u></p>
                            </div>
                            <div class="col"><label for="Affiliation">สังกัด/หลักสูตร</label>
                                <p><u>' . $master[7] . '</u></p>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col"><label for="Affiliation">ภาควิชา</label>
                                <p><u>' . $master[8] . '</u></p>
                            </div>
                            <div class="col"><label for="Affiliation">Email</label>
                                <p><u>' . $master[9] . '</u></p>
                            </div>
                        </div>
                        <br>

                        <b>ภาระงานสอนอาจารย์</b>
                        <br>
                        <div class="checkboktec">
                        
                            <label class="form-check-label" for="flexCheckDefault">
                                ปีการศึกษา 2563 ที่ผ่านมาจำนวน = <u>' . $master[10] . '</u>
                            </label>
                            <br>
                            
                            <label class="form-check-label" for="flexCheckDefault">
                                ปีการศึกษา 2564 ที่ผ่านมาจำนวน = <u>' . $master[11] . '</u>
                            </label>
                        </div>

                        <br>
                        <div>
                            
                            <br>
                            <div class="">
                                <label for="Affiliation"> รายละเอียดภาระงานที่จะมอบให้นิสิต</label>
                                <br>
                                <text type="text" rows="3">' . $master[12] . '</text>
                            </div>
                        </div>

                        <hr>
                        <h2>ส่วนที่ 2 ข้อมูลนิสิตช่วยงาน</h2>

                        <div class="row pt-2">
                            <div class="col "><label for="advisorname">ชื่อ-นามสกุล นิสิต</label>
                                <p><u>' . $master[13] . '</u></p>
                            </div>
                            <div class="col"><label for="advisorname">เบอร์โทร</label>
                                <p><u>' . $master[14] . '</u></p>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col "><label for="advisorname">รหัสประจำตัวนิสิต </label>
                                <p><u>' . $master[15] . '</u></p>
                            </div>
                            <div class="col "><label for="advisorname">การศึกษา </label>
                                <p><u>' . $master[16] . '</u></p>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col "><label for="advisorname">คณะ </label>
                                <p><u>' . $master[17] . '</u></p>
                            </div>
                            <div class="col"><label for="advisorname">สาขา </label>
                                <p><u>' . $master[18] . '</u></p>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col"><label for="ชั้นปี">สาขา </label>
                                <p><u>' . $master[19] . '</u></p>
                            </div>
                            <div class="col "><label for="nzxcame">คะแนนเฉลี่ยสะสม </label>
                                <p><u>' . $master[20] . '</u></p>
                            </div>
                        </div>
                        <br>
                        <div>
                            <b>ที่อยู่ปัจจุบัน ซึ่งสามารถติดต่อได้</b>
                            <br> <br>
                            <div class="col"><label for="locaton"> ที่อยู่</label>
                                <p><u>' . $master[21] . '</u></p>
                            </div>
                            <div class="col"><label for="province"> จังหวัด</label>
                                <p><u>' . $master[22] . '</u></p>
                            </div>
                            <div class="col"><label for="district"> อำเภอ</label>
                                <p><u>' . $master[23] . '</u></p>
                            </div>
                            <div class="col"><label for="parish"> ตำบล</label>
                                <p><u>' . $master[24] . '</u></p>
                            </div>
                            <div class="col pb-4"><label for="postcode"> รหัสไปรษณีย์</label>
                                <p><u>' . $master[25] . '</u></p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col "><label for="tel">โทรศัพท์ </label>
                                <p><u>' . $master[26] . '</u></p>
                            </div>
                            <div class="col"><label for="email">email </label>
                                <p><u>' . $master[27] . '</u></p>
                            </div>
                            <div class="col"><label for="line">line </label>
                                <p><u>' . $master[28] . '</u></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><label for="name">อาจารย์ที่ปรึกษา </label>
                            <p><u>' . $master[29] . '</u></p>
                            </div>
                            <div class="col"><label for="namaae">ชื่ออาจารย์ที่ปรึกษา</label>
                            <p><u>' . $master[30] . '</u></p>
                            </div>
                            <div class="col"><label for="lastzz2name">นามสกุลอาจารย์ที่ปรึกษา</label>
                            <p><u>' . $master[31] . '</u></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col "><label for="naasd2me">เบอร์โทรอาจารย์ที่ปรึกษา</label>
                            <p><u>' . $master[32] . '</u></p>
                            </div>
                            <div class="col"><label for="emailteach">Emailอาจารย์ที่ปรึกษา</label>
                            <p><u>' . $master[33] . '</u></p>
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
                </div>');
        } elseif ($tunname == 'emergency') {
            // echo"<pre>";
            // print_r($master);
            echo ('

                    <div class="container mt-5">
                        <h2>ผลกระทบจากสถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 19</h2>
                        <hr>
                        <div>
                            <b>ระลอกใหม่ของ บิดา มารดา ผู้ปกครองหรือ ผู้อุปการะของนิสิต </b>
                            <br><br>
                            <div>
                                <p>' . $master[1] . '' . $master[2] . ' บาท</p>
                            </div>
                            <div>
                            ' . $master[3] . '
                                <label for="start">ถูกพักงาน ตั้งแต่วันที่ :</label>
                                ' . $master[4] . '
                                <label for="start">จนถึง</label>
                                ' . $master[5] . '
                                ' . $master[6] . ' เดือน/ปี
                            </div>
                            <div>
                            ' . $master[7] . '
                            
                            </div>
                            <div>
                            ' . $master[8] . '
                                ' . $master[9] . ' บาท/เดือน ปัจจุบันไม่มีรายได้
                            </div>
                            <div>
                            ' . $master[10] . '
                                ' . $master[11] . ' บาท/เดือน
                            </div>
                            <div>
                            ' . $master[12] . '<br>
                            <p>' . $master[13] . '</p>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <b>ผลกระทบจากสถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 19 ระลอกใหม่ ที่เกิดขึ้นกับตัวนิสิต</b>
                            <br>
                            <br>
                            <div>
                            ' . $master[14] . '
                            รายได้เดือนละ ' . $master[15] . 'ปัจจุบันเหลือเดือนละ ' . $master[16] . ' บาท
                            </div>
                            <div>
                            ' . $master[17] . '
                            
                            </div>
                            <div>
                            ' . $master[18] . '<br>
                            ' . $master[19] . '
                            </div>
                        </div>
                        <hr>
                        <div>
                            <b>สรุปเหตุผลและความจำเป็นที่นิสิตต้องขอรับทุนช่วยเหลือ เนื่องจากได้รับผลจาก สถานการณ์แพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา 19 (COVID-19) ระลอกใหม่ (สามารถ เลือกหรือแสดงเหตุผลได้มากกว่า 1 ข้อ) </b>
                            
                            <br>
                            <div>
                            ' . $master[21] . '<br>
                            ' . $master[22] . '<br>
                            </div>
                            <div>
                            ' . $master[23] . '<br>
                            ' . $master[24] . '<br>
                            </div>
                            <div>
                            ' . $master[25] . '<br>
                            ' . $master[26] . '<br>
                            ' . $master[27] . '
                            </div>
                    
                        </div><br>
                        <div> <hr>
                            <b>รูปแบบการเข้าสอบสัมภาษณ์ของนิสิต </b>
                            <br> <br>
                            <div>
                            ' . $master[28] . '
                            </div>
                            <div>
                            ' . $master[29] . '
                            </div>
                        </div>

                <hr>
                <div style="margin-top: auto;">

                    <b>จดหมายเล่าประวตส่วนตัว ความจำเป็นที่ต้องขอรับทุนการศึกษา และข้อความบนนยาย ความสนใจและกิจกรรมต่างๆของตนเช่น สาเหตุความจูงใจในการเลือกเรียนวิชาทที่ตนเรียน งานที่จะทำเมื่อสำเร็จการศึกษาแล้ว</b><br>
                    ' . $master[29] . '
                    <br><br><br><br>

                </div>');
        } elseif ($tunname == 'tunasup') {
            // echo('<pre>');
            // print_r($master);
            echo ('
            <h2> นิสิตได้รับเงินค่าใช้จ่าย</h2>
            <div class="container1">
                <div class="row pt-2 ">
                    <div class="col ">
                        <label for="expend">นิสิตได้รับเงินค่าใช้จ่ายเดือนละ </label>
                        <u>' . $master[1] . '</u>
                    </div>
                    <div class="col "><label for="specifyexpend">จาก </label>
                    <u>' . $master[2] . '</u>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col"><label for="joiner">เกี่ยวข้องเป็น</label>
                    <u>' . $master[3] . '</u>
                    </div>
                    <div class="col"><label for="job">อาชีพ</label>
                    <u>' . $master[4] . '</u>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col"><label for="workplace">สถานที่ประกอบอาชีพ</label>
                    <u>' . $master[5] . '</u>
                    </div>
                    <div class="col"><label for="income">รายได้เดือนละ</label>
                    <u>' . $master[6] . '</u>
                    </div>
                </div><br>
                <hr>
                <h2> นิสิตมีรายได้จากการทำงานนอกเวลาการศึกษาหรือทางอื่นประมาณเดือนละ </h2>
                <div class="row pt-2">
                    <div class="col"><label for="income">รายได้เดือนละ</label>
                    <u>' . $master[7] . '</u>
                    </div>
                    <div class="col"><label for="typeofwork">ประเภทงานที่ทำ</label>
                    <u>' . $master[8] . '</u>
                    </div>
                </div>
                <br>
                <div class="col">
                    <label>ระบุสาเหตุของการรับทุน</label>
                    <div>
                    <u>' . $master[9] . '</u>
                    </div> <br>
                    <label>ระบุทุนการศีกษาและปีการศึกษาที่เคยได้รับทุน</label>
                    <div>
                    <u>' . $master[10] . '</u>
                    </div> <br>
                    <label>ขณะนี้อยู่ระหว่างขอทุนอื่นคือ</label>
                    <div>
                    <u>' . $master[11] . '</u>
                    </div> <br>
                    <label>สุขภาพและโรคประจำตัวของผู้สมัคร</label>
                    <div>
                    <u>' . $master[12] . '</u>
                    </div> <br>
                    <label>สถานศึกษาที่ผู้สมัครสำเร็จการศึกษาชั้นประถมและมัธยมศึกษา</label>
                    <div>
                    <u>' . $master[13] . '</u>
                    </div> <br>
                    <label>กิจกรรมเพื่อส่วนรวมและอื่น ๆ ที่กระทำ</label>
                    <div>
                    <u>' . $master[14] . '</u>
                    </div> <br>
                    <label>โครงการหรือความตั้งใจที่จะประกอบอาชีพในอนาคต</label>
                    <div>
                    <u>' . $master[15] . '</u>
                    </div>
                </div>
                <!-- </div> -->

            </div>

            ');
        }
    }

    ?>
</body>

</html>