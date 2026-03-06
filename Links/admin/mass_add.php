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
	
	if (!empty($_GET['list_categ']))
	{
		function GenerateCategoryListing($parent, $curText)
		{
			global $categories, $m_DB_prefix, $web_categ;

			$categs = dbQuery("SELECT id, title FROM ".$m_DB_prefix."category WHERE parent='".$parent."' ORDER BY title");
			while ($row = dbFetch($categs))
			{
				$categories .= "<option value=".$row[0].( ($web_categ == $row[0]) ? " selected" : "").">".$curText.$row[1];

				if ($row[0]== 1) $row[1] = "";
				GenerateCategoryListing($row[0], $curText.$row[1]." > ");
			}
		}

		$categories = "";
		GenerateCategoryListing(0, "");

		echo $categories;
		return;
	}

	if (!empty($_GET['from_list']))
	{
		$list = unserialize( file_get_contents_http($linkmetroURL."/mass_lists/".$_GET['from_list']) );

		if ($list[0] != $_GET['from_list'])
			return;

		for ($i=1; $i<count($list); $i++)
		{
			$row = $list[$i];
			$count = dbFetch("SELECT id FROM ".$m_DB_prefix."links WHERE lm_id='".$row[0]."' LIMIT 1");
			
			if (empty($count))
			{
				$query="lm_id='".$row[0]."', URL='".addslashes($row[1])."', `desc`='".addslashes($row[2])."', ".
							"title='".addslashes($row[3])."', added_to='".$row[4]."', linkback_on='', linkback_act=0";
				
				dbQuery("INSERT INTO ".$m_DB_prefix."links SET ".$query.", added_at=NOW()");
				$id = dbFetch("SELECT LAST_INSERT_ID()");
			} else 
				$id = $count;

			if (empty($categ[ $row[4] ]))
				$categ[ $row[4] ] = dbFetch("SELECT title, parent, id FROM ".$m_DB_prefix."category WHERE id='".$row[4]."'");

			$list[$i][5] = $id;
		}

		$response = array($_GET['from_list']);
		for ($i=1; $i<count($list); $i++)
		{
			$row = $list[$i];

			$response[] = array($row[0], makeURL_from_categ($categ[ $row[4] ][0], $row[4], 
												GenerateLinksPage_GetLinkPage($row[5], $row[3], $row[4])));
		}


		$done = array();
		$m_err = array();
		foreach ($categ as $value)
		{
			if (empty($done[   $value[1]   ])) { GenerateLinksPage_and_check_for_errors($value[1], $m_err);   $done[] = $value[1]; }
			if (empty($done[   $value[2]   ])) { GenerateLinksPage_and_check_for_errors($value[2], $m_err);   $done[] = $value[2]; }
		}

		if (count($m_err) != 0)
		{
			$response[0] = "Couldn't save ".count($m_err)." files:";

			for ($i=0; $i<count($m_err); $i++)
				$response[0] .= "<br>#_#".$m_err[$i];
		}


		echo serialize($response);
	}
?>