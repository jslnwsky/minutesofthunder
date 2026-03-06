<?
// *********************************************************************
//
// LinkMetro Web Solutions
//
// Source Copyright 2004-2006 Bryxen Software
// Unauthorized reproduction or editing is not allowed !
//
// *********************************************************************
	include "func_generate_lpages.php";

	$debug = (!empty($_GET['debug'])) ? 1 : 0;

?><div id="main-copy">
  <div class="twoThirds noBorderOnLeft">
	  <h1>Check backlinks</h1><br><br><br>
<?	if (empty($_GET['step']))
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
		$web_categ = 0;
		GenerateCategoryListing(0, "");
?>

	<table width=0 cellspacing=0 cellpadding=0><tr><td>
	<form action="admin.php" method='get' name='main_select_form'>
		<input type=hidden name=IFLM value='<?=$IFLM;?>'>
		<input type=hidden name=debug value='<?=$debug;?>'>
		<input type=hidden name=page value='check_back'>
		<input type=hidden name=step value='1'>
		<nobr>Check links under category: <select name=parent></nobr>
		<?=$categories;?></select><br>
		<input type=checkbox name=sub value=1 checked>Check subcategories too<br><br>
	</td></tr><tr><td align=right>
		<input type=submit value="Go" class=black_btn>
	</form>
	</td></tr></table>
	
<?	} else if ($_GET['step'] == 1)
	{
		$categs = array($_GET['parent']);

		if (!empty($_GET['sub']))
		{
			for ($i=0; $i<count($categs); $i++)
			{
				$subs = dbQuery("SELECT id FROM ".$m_DB_prefix."category WHERE parent='".$categs[$i]."'");

				while ($row = dbFetch($subs))
					$categs[] = $row[0];
			}
		}

		if (empty($_GET['more'])) { ?>
			<table width=80% align=center cellspacing=1 cellpadding=1>
			<tr><th colspan=4><b>Select the websites you would like to verify that your link still exists</b></th></tr>
			<tr><th></th><th align=center><b>Website URL</b></th><th align=center><b>Website title</b></th><th align=center><b>Last check</b></th></tr>
			<form action="admin.php?IFLM=<?=$IFLM;?>&debug=<?=$debug;?>&page=check_back&step=2" method=post>
<?		}

		$max_link = 0;
		$id = 0;

		$added_to = "";
		for ($i=0; $i<count($categs); $i++)
		{
			if ($i) $added_to .= " OR ";
			$added_to .= "added_to='".$categs[$i]."'";
		}

		$links = dbQuery("SELECT id, title, url, linkback_on, TO_DAYS(NOW()) - TO_DAYS(last_check), last_check=0 FROM ".$m_DB_prefix."links WHERE (".$added_to.") AND visible=1 AND (linkback_on != '' OR lm_id != 0) ORDER BY linkback_on='', url");
		while ($row = dbFetch($links))
		{
			if (substr($row[2], 0, 7) != "http://")
			{
				$row[2] = "http://".$row[2];
				dbQuery("UPDATE ".$m_DB_prefix."links SET url='".$row[2]."' WHERE id='".$row[0]."'");
			}

			if ($row[3] != "")
				echo "<tr><td width=0%><input type=checkbox value='".$row[0]."' name='id".$id."' checked></td>".
						 "<td width=50%><a href='redirect.php?url=".urlencode($row[3])."' target=_blank>".htmlspecialchars($row[3])."</a></td>";
			else
				echo "<tr><td width=0%><input type=checkbox value='".$row[0]."' name='id".$id."'></td>".
						 "<td width=50%><i>".$row[2]."</i></td>";

			echo "<td width=40%>".$row[1]."</td>";

			if ($row[5] == 1) echo "<td width=10% align=center>never</td>";
			else              echo "<td width=10% align=center><nobr>".$row[4]." day(s) ago</nobr></td>";

			echo "</tr>";

			$max_link = max($max_link, ++$id);
		}

		if ($id == 0)
		{
			echo "<tr><td colspan=3>No links with reciprocal URL inserted in these categories</td></tr>";
		} else { ?>
			</table><input type=hidden name='max_link' value='<?=$max_link;?>'>
			<br>
			<center><input type=button class=black_btn value="Select All" onClick='selectAllChecks(1)'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			        <input type=button class=black_btn value="Unselect All" onClick='selectAllChecks(0)'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit class=black_btn value="Next"></center></form>
<?		}
	} 
?>

	</div>
</div>

<?
	if (!empty($_GET['step']) && $_GET['step'] == 2)
	{
		echo "<form action='admin.php?IFLM=".$IFLM."&debug=".$debug."&page=check_back&step=3' method=post>";
		echo "<input type=hidden name='max_link' value='".$_POST['max_link']."'>";

		
		echo "<div style='width:545px; text-align:center;'>";
		echo "<div style='float: left; width:270px; padding-top:2px; padding-bottom:2px; text-align:center; background:#EFEFFF border-bottom: 1px solid black;'><b>Web Site URL</b> </div>";
		echo "<div style='float: left; width:175px; padding-top:2px; padding-bottom:2px; text-align:center; background:#EFEFFF border-bottom: 1px solid black;'><b>Status</b></div>";
		echo "<div style='float: left; width:50px; padding-top:2px; padding-bottom:2px; text-align:center; background:#EFEFFF border-bottom: 1px solid black;'><b>Hide</b>  </div>";
		echo "<div style='float: left; width:50px; padding-top:2px; padding-bottom:2px; text-align:center; background:#EFEFFF border-bottom: 1px solid black;'><b>Delete</b></div>";
		echo "</div>";

		for ($i=0, $j=0; $i<=$_POST['max_link']; $i++)
		{
			if (empty($_POST['id'.$i])) continue;

			$id = $_POST['id'.$i];

			$site = dbFetch("SELECT URL, linkback_on, lm_id FROM ".$m_DB_prefix."links WHERE id='".$id."'");
			
			echo "<div class=div_row".((++$j % 2) ? "1" : "2").">";
				echo "<div class=div_col1><a href='redirect.php?URL=".urlencode($site[1])."' target=_blank>".$site[0]."</a></div>"; flush();
				echo "<div class=div_col2>&nbsp;&nbsp;";

				if ($site[1] == "" && $site[2] != 0)
				{
					$input = file_get_contents_http("http://www.linkmetro.com/get_site_backlink.php?lm_id=".$site[2]."&srv=".$_SERVER['SERVER_NAME'], $debug);
					if ($input === false)
					{
						echo "Cannot connect to www.linkmetro.com !";
					} else {
						$file = explode("\n", $input);

						if (!empty($file) && $file[0] == 1)
						{
							dbQuery("UPDATE ".$m_DB_prefix."links SET linkback_on='".addslashes($file[1])."' WHERE id='".$id."'");
							
							$site[1] = $file[1];
						} else
							if (!empty($file) && $file[0] == 2)
								echo " <font color=red> Request was canceled</font>";
					}
					
					$res = 0;
				}

				if ($site[1] != "")
				{
					$check_link_hint = "";
					
					$res = check_link($site[1], $m_sugestedLinkURL, false, 0, $debug);

					if ((!$res && $check_link_page_from_LMA) || (!$res && $site[2] != 0 && strncmp($check_link_hint, "Cannot connect", 14) != 0))
					{
						$content = file_get_contents_http(substr($site[1], 0, strrpos($site[1], '/'))."/admin/findlink.php?s=".urlencode($_SERVER['SERVER_NAME']), $debug);
						$res = 0;
		
						if (!empty($content) && strlen($content) < 1024)
						{
							$tempSiteURL = substr(substr($site[1], 0, strrpos($site[1], '/')), 0, -4).$content;

							$res = check_link($tempSiteURL, $m_sugestedLinkURL, false, 0, 0);

							if ($res)
							{
								$site[1] = $tempSiteURL;
								dbQuery("UPDATE ".$m_DB_prefix."links SET linkback_on='".addslashes($tempSiteURL)."' WHERE id='".$id."'");
							}
						}
						
						if ($res) echo " <font color=green> Your link was moved <a href='redirect.php?URL=".urlencode($site[1])."' target=_blank>here</a></font><br>";
						else      echo " <font color=red> Your link was not found</font><br>";
					} else {
						if ($res) echo " <font color=green> Your link was found</font><br>";
						else if ($check_link_hint != "")
							 echo $check_link_hint. "<br> <font color=red> Your link was not found</font><br>";
						else echo                       " <font color=red> Your link was not found</font><br>";
					}
				}

				echo "</div>";

				if (empty($res)) $res = 0;
				dbQuery("UPDATE ".$m_DB_prefix."links SET linkback_act='".$res."', last_check=NOW() WHERE id='".$id."'");

				echo "<div class=div_col3><input type=checkbox name=ch".$i."0 value='".$id."'".((empty($res)) ? " selected":"")."></div>";
				echo "<div class=div_col4><input type=checkbox name=ch".$i."1 value='".$id."'></div>";

			echo "</div>\n";
			flush();
			
			if (false)
				echo "<div style='border: 2px solid; font-size: x-small; width:675px; height:200px; overflow:scroll'>".$n_checkLink_res."</div>";
		}

		echo "<div class=div_row1 style='text-align:center'><input type=submit value='Update'></div><br></form>";

		echo "<br><br><b>DONE</b>";
	}
	
	if (!empty($_GET['step']) && $_GET['step'] == 3)
	{
		for ($i=0; $i<=$_POST['max_link']; $i++)
		{
			if (!empty($_POST['ch'.$i.'0'])) dbQuery("UPDATE ".$m_DB_prefix."links SET visible=0 WHERE id='".$_POST['ch'.$i.'0']."'");
			if (!empty($_POST['ch'.$i.'1'])) dbQuery("DELETE FROM ".$m_DB_prefix."links          WHERE id='".$_POST['ch'.$i.'1']."'");
		}

		GenerateLinksPage(1, true);
		echo "The website(s) was successfully deleted or hidden";
	}
	
	?>
<script language=javascript>

function selectAllChecks(val)
{
	if (typeof(document.getElementsByName('max_link')[0]) != "undefined")
	{
		var to = parseInt(document.getElementsByName('max_link')[0].value);

		for (i=0; i<to; i++)
		{
			if (typeof(document.getElementsByName('id'+i)[0]) != "undefined")
			{
				document.getElementsByName('id'+i)[0].checked = val;
			}
		}
	}
}

</script>