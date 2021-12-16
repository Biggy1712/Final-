<?php

ob_start();
session_start();
ini_set('max_execution_time', 300);
set_time_limit(300);
header('Content-Type: application/json');
header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: GET-check=0, pre-check=0", false);


// $_REQUEST['skill'];
// $Skill = $_REQUEST['skill'];

function Session_Logout()
{
	unset($_SESSION["luser"]);
	unset($_SESSION["start"]);
	unset($_SESSION["expire"]);
	unset($_SESSION["skill_sent"]);

	session_destroy();
	header("Location: https://callservicechat.gosoft.co.th/KMSearch/front/login_front.php");
}
$Db_Servername = 'webkm';
$Db_Username = 'root';
$Db_Password = 'dbwebkm@2016';
$Db_name = 'webkm';

$conn = mysqli_connect($Db_Servername, $Db_Username, $Db_Password, $Db_name);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
print_r($conn);
// $Content = "CONTENT_TYPE_ID = 1 ";

// $SkillEx = explode("|", str_replace('"', '', $Skill));

// $sqlcontenttype = "SELECT TOPIC,SKILL,CONTENT_ID,CONTENT_TYPE_NAME FROM vw_content_webkm WHERE " . $Content . "   LIMIT 25";

// $resultsqlsks = mysqli_query($conn, $sqlcontenttype);

// if (mysqli_num_rows($resultsqlsks) !== null) {
// 	while ($rowsks = mysqli_fetch_assoc($resultsqlsks)) {
// 		$Resssks[] = array(
// 			'skillsks' => $rowsks['SKILL'],
// 		);

// 		$exp = explode('|', $rowsks['SKILL']);

// 		if (array_intersect($SkillEx, $exp)) {


// 			$newArray[] = array(
// 				'topic' => $rowsks['TOPIC'],

// 				'content_id' => $rowsks['CONTENT_ID'],
// 				'content_type_name' => $rowsks['CONTENT_TYPE_NAME'],
// 			);



// 			$jsoned = str_replace('][', ",", json_encode($newArray, JSON_UNESCAPED_UNICODE));
// 			$jsonedDes = json_encode($newArray, JSON_UNESCAPED_UNICODE);
// 		}
// 	}
// 	echo $jsoned;
// 	return $jsoned;
// }
