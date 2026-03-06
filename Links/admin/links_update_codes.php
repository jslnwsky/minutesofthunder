<?
	if (empty($_GET['update']) || $_GET['update'] != $m_LM_code || $IFLM != $m_LM_code)
		if (!empty($URL)) $link_update_codes_return_URL = "admin.php?IFLM=".$IFLM."&rev=".$rev."&page=".$page."&URL="   .$URL   ."&cur_page=".$cur_page."&force_upd=".rand();
		else              $link_update_codes_return_URL = "admin.php?IFLM=".$IFLM."&rev=".$rev."&page=".$page."&parent=".$parent."&cur_page=".$cur_page."&force_upd=".rand();

	if (!empty($_GET['update']))
	{
		if ($_GET['update'] == $m_LM_code && $m_LM_code != 1 && $IFLM == $m_LM_code)
		{
			$id       = 0;
			$lm_id    = $_GET['m_lm_id']+0;
			$url      = $_GET['m_url'  ]; if (!get_magic_quotes_gpc()) $url   = addslashes($url  );
			$title    = $_GET['m_title']; if (!get_magic_quotes_gpc()) $title = addslashes($title);
			$desc     = $_GET['m_desc' ]; if (!get_magic_quotes_gpc()) $desc  = addslashes($desc );
			$categ    = explode("@", $_GET['m_categ']);
			$recip    = "";

			echo "-- start result --";
			$parent = 1;
			for ($i=0; $i<count($categ); $i++)
			{
				$m_cur_id = dbFetch("SELECT id FROM ".$m_DB_prefix."category WHERE parent='".$parent."' AND title='".$categ[$i]."'");

				if (empty($m_cur_id))
				{
					dbQuery("INSERT INTO ".$m_DB_prefix."category SET parent='".$parent."', title='".$categ[$i]."'");
					$m_cur_id = dbFetch("SELECT LAST_INSERT_ID()");
				}

				$parent = $m_cur_id[0];
			}
			$categ = $parent;
		} else {
			$id       = $_POST['m_id'   ]+0;
			$lm_id    = $_POST['m_lm_id']+0;
			$url      = $_POST['m_url'  ]; if (!get_magic_quotes_gpc()) $url   = addslashes($url  );
			$title    = $_POST['m_title']; if (!get_magic_quotes_gpc()) $title = addslashes($title);
			$desc     = $_POST['m_desc' ]; if (!get_magic_quotes_gpc()) $desc  = addslashes($desc );
			$categ    = $_POST['m_categ']+0;
			$recip    = $_POST['m_recip']; if (!get_magic_quotes_gpc()) $recip = addslashes($recip);
		}
		$recip_ok = 0;

		if ($recip != "")
			$recip_ok = @check_link($recip, $m_sugestedLinkURL);

		if (empty($recip_ok)) $recip_ok = 0;

		if (substr($url, 0, 7) != "http://")
			$url = "http://".$url;

		$query="lm_id='".$lm_id."',URL='".$url."', `desc`='".$desc."', title='".$title."', added_to='".$categ."', linkback_on='".$recip."', linkback_act='".$recip_ok."'";

		if ($id == 0)
		{
               dbQuery("INSERT INTO ".$m_DB_prefix."links SET ".$query.", added_at=NOW()");
		 $id = dbFetch("SELECT LAST_INSERT_ID()");	$id = $id[0];
			   dbQuery("UPDATE ".$m_DB_prefix."links SET `order`=".$id." WHERE id=".$id);
		} else dbQuery("UPDATE ".$m_DB_prefix."links SET ".$query." WHERE id='".$id."'");

		GenerateLinksPage($categ);

		if ($_GET['update'] == $m_LM_code && $m_LM_code != 1 && $IFLM == $m_LM_code)
		{
			$categ_name = dbFetch("SELECT title FROM ".$m_DB_prefix."category WHERE id='".$categ."'");
			
			$page = GenerateLinksPage_GetLinkPage($id, $title, $categ);

			echo "OK... ".$m_localServerURL.makeURL_from_categ($categ_name[0], $categ, $page);

			die("-- end result --");
		} else

		if ($lm_id && $IFLM && (!empty($_POST['m_r']) || !empty($_POST['m_with'])))
		{
			$categ_name = dbFetch("SELECT title FROM ".$m_DB_prefix."category WHERE id='".$categ."'");
			
			$page = GenerateLinksPage_GetLinkPage($id, $title, $categ);

			echo "<script language=javascript>";
			if (!empty($_POST['m_r']))
				echo " window.parent.location = '".$linkmetroURL."/approve_link.php?id=".$_POST['m_r']."&show_site=".$_POST['m_show_site']."&step=2&m_localLink=".urlencode( $m_localServerURL.makeURL_from_categ($categ_name[0], $categ, $page) )."';";
			else if (!empty($_POST['m_with']))
				echo " window.parent.location = '".$linkmetroURL."/request_link.php?id=".$_POST['m_lm_id']."&m_with=".$_POST['m_with']."&step=2&m_localLink=".urlencode( $m_localServerURL.makeURL_from_categ($categ_name[0], $categ, $page) )."';";
			echo "</script>";

			exit;
		} else {
			$link_update_codes_return_URL = str_replace("parent=".$parent, "parent=".$categ, $link_update_codes_return_URL);

			die("<script language=javascript> document.location= '".$link_update_codes_return_URL."'; </script>");
		}
	}

	if (!empty($_GET['hide']))
	{
		dbQuery("UPDATE ".$m_DB_prefix."links SET visible=0 WHERE id='".$_GET['hide']."'");
		GenerateLinksPage($parent);
		die("<script language=javascript> document.location= '".$link_update_codes_return_URL."'; </script>");
	}

	if (!empty($_GET['unhide']))
	{
		dbQuery("UPDATE ".$m_DB_prefix."links SET visible=1 WHERE id='".$_GET['unhide']."'");
		GenerateLinksPage($parent);
		die("<script language=javascript> document.location= '".$link_update_codes_return_URL."'; </script>");
	}

	if (!empty($_GET['approve']))
	{
		dbQuery("UPDATE ".$m_DB_prefix."links SET visible=1 WHERE id='".$_GET['approve']."'");
		GenerateLinksPage($parent);
		die("<script language=javascript> document.location= '".$link_update_codes_return_URL."'; </script>");
	}

	if (!empty($_GET['del']))
	{
		dbQuery("DELETE FROM ".$m_DB_prefix."links WHERE id='".$_GET['del']."'");
		GenerateLinksPage($parent);
		die("<script language=javascript> document.location= '".$link_update_codes_return_URL."'; </script>");
	}

	if (!empty($_GET['check']))
	{
		$row = dbFetch("SELECT linkback_on, url FROM ".$m_DB_prefix."links WHERE id='".$_GET['check']."'");
		$recip_ok = @check_link($row[0], $_SERVER['SERVER_NAME']);

		
		
		if ((!$res && $check_link_page_from_LMA) || ($site[2] != 0 && strncmp($check_link_hint, "Cannot connect", 14) != 0))
		{
			$content = file_get_contents_http(substr($site[1], 0, strrpos($site[1], '/'))."/admin/findlink.php?s=".urlencode($_SERVER['SERVER_NAME']), $debug);
			$res = 0;

			if (!empty($content))
			{
				$site[1] = substr(substr($site[1], 0, strrpos($site[1], '/')), 0, -4).$content;
				dbQuery("UPDATE ".$m_DB_prefix."links SET linkback_on='".addslashes($site[1])."' WHERE id='".$id."'");

				$recip_ok = check_link($site[1], $m_sugestedLinkURL, false, 0, 0);
			}
		}

		dbQuery("UPDATE ".$m_DB_prefix."links SET linkback_act='".$recip_ok."' WHERE  id='".$_GET['check']."'");
	}
?>