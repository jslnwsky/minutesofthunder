<?
	include "functions.php";

	$id  = $_GET['i']+0;    
	$url = $_GET['p'];  if (!get_magic_quotes_gpc()) $url = addslashes($url);

	dbQuery("UPDATE links SET linkback_on='".$url."', linkback_act1 WHERE lm_id='".$id."'");
?>