<?
	include "config.php";
	include "functions.php";
	include "func_generate_lpages.php";

	$URL = (!empty($_GET['s'])) ? $_GET['s'] : ""; if (!get_magic_quotes_gpc()) $URL = addslashes($URL);
	if (substr($URL, 0, 4) == "www.") $URL = substr($URL, 4);

	$site_id = dbFetch("SELECT id, URL, added_to, title FROM ".$m_DB_prefix."links WHERE visible=1 AND url='http://".$URL."' OR url='http://www.".$URL."' OR url LIKE 'http://".$URL."/%' OR url LIKE 'http://www.".$URL."/%'");

	if ($site_id)
	{
		$page = GenerateLinksPage_GetLinkPage($site_id[0], $site_id[3], $site_id[2]);

		$categ = dbFetch("SELECT title FROM ".$m_DB_prefix."category WHERE id='".$site_id[2]."'");
		echo makeURL_from_categ($categ[0], $site_id[2], $page);
	}
?>