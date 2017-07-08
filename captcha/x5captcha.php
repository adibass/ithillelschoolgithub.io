<?php
include("../res/x5engine.php");
$nameList = array("vky","2wk","twe","ulh","zd2","zsa","48z","l58","2en","fj8");
$charList = array("8","G","H","T","M","7","Y","A","2","U");
$cpt = new X5Captcha($nameList, $charList);
//Check Captcha
if ($_GET["action"] == "check")
	echo $cpt->check($_GET["code"], $_GET["ans"]);
//Show Captcha chars
else if ($_GET["action"] == "show")
	echo $cpt->show($_GET['code']);
// End of file x5captcha.php
