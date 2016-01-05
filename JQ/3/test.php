<?php

isset($_POST["les"]) ? $les = $_POST["les"] : $les = $_GET["les"];

switch ($les) {

	case 1: $a = $_POST["a"]; $b = $_POST["b"]; echo $a + $b; break;
	case 10: $a = $_GET["a"]; $b = $_GET["b"]; echo "Присланные данные a=".$a.", b= ".$b; break;
	case 11: echo "{\"id\":\"1\",\"name\":\"ivan\",\"country\":\"Russia\",\"office\":[\"yandex\",\"management\"]}"; break;
	case 13: if (is_numeric($_POST["a"])) {echo "Это <strong>число</strong>";}else {echo "Это <strong>символ</strong>";} ; break;
	case 14: $a = $_POST["a"]; $b = $_POST["b"]; echo "Присланные данные a=".$a.", b= ".$b; break;

}