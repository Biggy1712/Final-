<?php
session_start();
ob_start();
if ($_SESSION['login2'] != "true") {
    header("Location: http://localhost/intern/Staff/login_staff.php");
    session_destroy();
}
$from = $_REQUEST['from'];
if($from){}
else{
    header("Location: http://localhost/intern/Staff");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/Intern/Nisit/resource/css.css">


    <script>
        window.onscroll = function() {
            myFunction()
        };

        // Get the navbar
        var navbar = document.getElementById("topnav");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
</head>

<body>
    <?php
    include "../nisit/resource/navIndex.php";
    ?>

    <br>
    <div class="bigBoxHome">
        <br> <br>
        <h1 style="text-align: center;color:green">ระบบสมัครขอรับทุนการศึกษา</h1> <br>
        <P style="text-align: center;color:black">มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตศรีราชา</P> <br>
        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="https://static.wixstatic.com/media/9c9d35_ced873e36a314500b7891e2d38b68a11~mv2.png/v1/fill/w_220,h_220,al_c,q_85,usm_0.66_1.00_0.01/Kids%20Studying%20from%20Home-rafiki.webp x" style="width:220px;height:220px;object-fit:cover;object-position:50% 50%;display: block;margin-left: auto;margin-right: auto;width: 50%;">
                    <h3><a href="http://localhost/Intern/staff/homestaff.php?table=<?php echo($from); ?>">ตรวจสอบเอกสาร</a></h3>
                    <br>
                    <h3 style="color:green !important"><a style="color:green !important" href="http://localhost/Intern/staff/homestaff.php?table=<?php echo($from); ?>"><u>คลิ้ก</u></a></h3>
                    <br>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="https://static.wixstatic.com/media/9c9d35_f7ff9eecfd97479f9965a535ebd4812c~mv2.png/v1/fill/w_220,h_220,al_c,q_85,usm_0.66_1.00_0.01/Learning-rafiki.webp" alt="Learning-rafiki.png" style="width:220px;height:220px;object-fit:cover;object-position:50% 50%;display: block;margin-left: auto;margin-right: auto;width: 50%;">
                    <h3><a href="http://localhost/Intern/staff/homestaff2.php?table=<?php echo($from); ?>">พิจารณาสอบสัมภาษณ์</a></h3>
                    <br>
                    <h3 style="color:green !important"><a style="color:green !important" href="http://localhost/Intern/staff/homestaff2.php?table=<?php echo($from); ?>"><u>คลิ้ก</u></a></h3>
                    <br>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="https://static.wixstatic.com/media/9c9d35_aabc50d74b8b4903a292c932d01d844a~mv2.png/v1/fill/w_220,h_220,al_c,q_85,usm_0.66_1.00_0.01/Library-rafiki.webp" alt="Library-rafiki.png" style="width:220px;height:220px;object-fit:cover;object-position:50% 50%;display: block;margin-left: auto;margin-right: auto;width: 50%;">
                    <h3><a href="http://localhost/Intern/staff/homestaff3.php?table=<?php echo($from); ?>">ผ่านการสอบสัมภาษณ์</a></h3>
                    <br>
                    <h3 style="color:green !important"><a style="color:green !important" href="http://localhost/Intern/staff/homestaff3.php?table=<?php echo($from); ?>"><u>คลิ้ก</u></a></h3>
                    <br>
                </div>
            </div>
        </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <div class="footer" style="    background-color: rgb(247 247 247);">

            <p>ต้องการทราบรายละเอียดเพิ่มเติม หรือมีปัญหาในการสมัคร กรุณาติดต่อ งานกิจการนิสิต โทร. 06-5716-2628 email : malai.pa@ku.th </p>
        </div>
    </div>
</body>

</html>