<?
// *********************************************************************
//
// LinkMetro Web Solutions
//
// Source Copyright 2004-2006 Bryxen Software
// Unauthorized reproduction or editing is not allowed !
//
// *********************************************************************

	include "config.php";
	include "functions.php";
	include "func_generate_lpages.php";
	
	if (!empty($_GET['lm_id' ])) $lm_id  = $_GET['lm_id']; else $lm_id = 0;
	if (!empty($_GET['bk'    ])) $bk     = $_GET['bk'   ]; else $bk    = "";	if (!get_magic_quotes_gpc()) $bk = addslashes($bk);
	if (!empty($_GET['killed'])) $killed = 1;

	if ($ml_id && $bk != "")
		dbQuery("UPDATE ".$m_DB_prefix."links SET linkback_on='".$bk."', linkback_act=1 WHERE lm_id='".$lm_id."'");

	if ($lm_id && $killed)
	{
		dbQuery("UPDATE ".$m_DB_prefix."links SET linkback_on='', linkback_act=0, visible=0 WHERE lm_id='".$lm_id."'");
	
		$categ = dbFetch("SELECT added_to FROM links WHERE lm_id='".$lm_id."'");
		$parent = dbFetch("SELECT parent FROM category WHERE id='".$categ[0]."'");

		if ($parent[0] != 0) GenerateLinksPage($parent[0]);
		GenerateLinksPage($categ[0]);
	}
?>