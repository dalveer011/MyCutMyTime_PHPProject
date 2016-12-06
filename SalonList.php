<?php
require_once 'model/Database.php';
require_once 'model/JSONConverter.php';

$myJSON = new JSONConverter();
$query = "SELECT DISTINCT s.name,s.streetaddress,s.city,s.province,s.postalcode,s.id,SUM(r.rating) as total,COUNT(s.id) as numberOfPeople
from salon s LEFT OUTER JOIN review r on s.id = r.salonid GROUP by s.id;";
$json = $myJSON->convertToJSON($query);
header("Content-Type: application/json");
echo $json;