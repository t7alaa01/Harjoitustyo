<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/dbclass.php';
include_once '../entities/tuote.php';
//Path to this file: ̃/public_html/tuote/read.php
$dbclass = new DBClass();
$connection = $dbclass->getConnection();
$tuote = new tuote($connection);
$stmt = $tuote->read();
$count = $stmt->rowCount();
//print $count;
if($count > 0){
	$tuotes = array();
	$tuotes["body"] = array();
	//$tuotes["count"] = $count;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$p = array(
			"idtuote" => $idtuote,
			"tuotenimi" => $tuotenimi,
			"valmistaja" => $valmistaja,
			"hinta" => $hinta
		);
		array_push($tuotes["body"], $p);
	}
	echo json_encode($tuotes);


}
?>