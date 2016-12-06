<?php
require_once 'model/requireClasses.php';
$salonid = $_GET['salonId'];
$myjson = new JSONConverter();
$query = "select * from orders where salonid=:salonid";
$assArray = [':salonid'=>$salonid];
$getJSON = $myjson->convertToJSONConditionalQuery($query,$assArray);
header("Content-Type: application/json");
echo $getJSON;