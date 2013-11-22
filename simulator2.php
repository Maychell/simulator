<?php

include "index.php";
$conexao = mysql_connect("localhost","root","adminsa");
mysql_select_db("energy",$conexao);

$meter_id = $_POST['meter_id'];

$query = "SELECT id,
	  (UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(created_at))/60 AS diff_created_at,
	  (UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(updated_at))/60 AS diff_updated_at
	  FROM consumptions WHERE meter_id =".$meter_id." ORDER BY id DESC LIMIT 1";
$resultado = mysql_query($query,$conexao) or die(error());;

$query = mysql_fetch_array($resultado);
//Recuperando as variáveis
$id = $query[0];
$created_at = $query[1];
$updated_at = $query[2];

if($updated_at == "")
	$time = $created_at;
else
	$time = $updated_at;

if($time=="" || $time>=2 || $resultado=="")
	$query = "INSERT INTO consumptions (meter_id, created_at) VALUES ($meter_id, NOW())";
else
	$query = "UPDATE consumptions SET updated_at = NOW() WHERE id = $id";

$resultado = mysql_query($query,$conexao);

$response = array("sucess" => true);
echo json_encode($response);

?>
