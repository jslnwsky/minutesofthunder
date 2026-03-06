<?
// *********************************************************************
//
// LinkMetro Web Solutions
//
// Source Copyright 2004-2006 Bryxen Software
// Unauthorized reproduction or editing is not allowed !
//
// *********************************************************************
?><div id="main-copy">
  <div class="twoThirds noBorderOnLeft">
<?
		if (!empty($_GET['id'   ])) $id    = $_GET['id'   ]; else $id    = 0;
		if (!empty($_GET['rev'  ])) $rev   = $_GET['rev'  ]; else $rev   = 0;
		if (!empty($_GET['lm_id'])) $lm_id = $_GET['lm_id']; else $lm_id = 0;
		if (!empty($_GET['lm_mU'])) $lm_mU = $_GET['lm_mU']; else $lm_mU = ""; if (!get_magic_quotes_gpc()) $lm_mU = addslashes($lm_mU);
		if (!empty($_GET['lm_mT'])) $lm_mT = $_GET['lm_mT']; else $lm_mT = ""; if (!get_magic_quotes_gpc()) $lm_mT = addslashes($lm_mT);
		if (!empty($_GET['lm_mD'])) $lm_mD = $_GET['lm_mD']; else $lm_mD = ""; if (!get_magic_quotes_gpc()) $lm_mD = addslashes($lm_mD);
		if (!empty($_GET['lm_mR'])) $lm_mR = $_GET['lm_mR']; else $lm_mR = ""; if (!get_magic_quotes_gpc()) $lm_mR = addslashes($lm_mR);

		if (empty($_GET['hide_header']))
			if (empty($id)) echo "<h1>Add link</h1><br><br><br>";
			else            echo "<h1>Edit link</h1><br><br><br>";
		else echo "<table width=100% style='border: 1px solid #C0C0C0;' cellpadding=4 border=0 cellspacing=0><tr><td style='background-color:#EFEFEF; color:#515151; font: bold 12px Arial'>Advanced Member</td></tr></table>";


		$readonly = "";

		if (!empty($id))
		{
			$site = dbFetch("SELECT id, lm_id, URL, `desc`, title, added_to, linkback_on FROM ".$m_DB_prefix."links WHERE id='$id'");

			$lm_id      = $site[1];

			$url        = $site[2];
			$title      = $site[4];
			$desc       = $site[3];
			$recip      = $site[6];

			$parent     = $site[5];
		} else if (!empty($lm_id)) {
/*			$arr = unserialize( file_get_contents_http($linkmetroURL."/get_site_info.php?id=".$lm_id."&u=".$_GET['u']."&r=".$_GET['r']) );
	
			$title      = (count($arr) > 0) ? $arr[0] : "";
			$url        = (count($arr) > 1) ? $arr[1] : "";	if (substr($url, 0, 7) != "http://") $url = "http://".$url;
			$desc       = (count($arr) > 2) ? $arr[2] : "";
			$recip      = (count($arr) > 3) ? $arr[3] : "";

			$parent     = 0;
*/
			$title      = $lm_mT;
			$url        = $lm_mU; if (substr($url, 0, 7) != "http://") $url = "http://".$url;
			$desc       = $lm_mD;
			$recip      = $lm_mR;

			$readonly = " readonly><font size=1 color=gray>(read only)</font";
		} else {
			$url        = "http://";
			$title      = "";
			$desc       = "";
			$recip      = "";

			$parent     = 0;
		}

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

<form action='admin.php?IFLM=<?=$IFLM;?>&rev=<?=$rev;?>&page=<? if (empty($_GET['URL'])) echo "links&parent="; else echo "search_links&URL=".$_GET['URL']; ?>&update=1&hide_header=<?=!empty($_GET['hide_header']);?>&cur_page=<?=$_GET['cur_page'];?>' method=post>
	<table cellspacing=0 cellpadding=5 align=center>
		<input type=hidden name=m_id value='<?=$id;?>'>
		<input type=hidden name=m_lm_id value='<?=$lm_id;?>'>
		<input type=hidden name=m_r value='<?= (empty($_GET['r']) ? '' : $_GET['r']);?>'>
		<input type=hidden name=m_with value='<?= (empty($_GET['m_with']) ? '' : $_GET['m_with']);?>'>
		<input type=hidden name=m_show_site value='<?= (empty($_GET['show_site']) ? '' : $_GET['show_site']);?>'>

		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(0);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Website URL:        </td><td><input type=text maxlength=100 name=m_url value='<?=htmlspecialchars(stripcslashes($url), ENT_QUOTES);?>' style='width:300px'<?=$readonly;?>><br><sup>(max 100 chars)</sup></td></tr>
		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(1);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Website Title:      </td><td><input type=text maxlength=100 name=m_title value='<?=htmlspecialchars(stripcslashes($title), ENT_QUOTES);?>' style='width:300px'<?=$readonly;?>><br><sup>(max 100 chars)</sup></td></tr>
		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(2);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Website Description:</td><td><textarea maxlength=250 style='width:300px; height:100px' name=m_desc<? if ($readonly != "") echo " readonly";?>><?=htmlspecialchars(stripcslashes($desc), ENT_QUOTES);?></textarea><br><sup>(max 250 chars<? if ($readonly != "") echo " - <font color=gray>read only</font>";?>)</sup></td></tr>
		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(3);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Choose category:    </td><td><select style='width:300px' name=m_categ><?=$categories;?></select></tr>

<? if (empty($lm_id) || empty($_GET['u'])) { ?>
		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(4);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Reciprocal URL:     </td><td><input type=text maxlength=150 name=m_recip value='<?=$recip;?>' style='width:300px'<?=$readonly;?>>&nbsp;<img src='img/open.gif' onClick='goRecip()'><br><sup>(max 150 chars)</sup></td></tr>
<? } else { ?>
			<input type=hidden name=m_recip value='<?=$recip;?>'>
<? } ?>
		
		<tr><td colspan=2 height=1><img src='img/spacer.gif' height=5></td></tr>
		<tr><td colspan=2 align=center><input type=submit class=black_btn value="<?=(empty($id)) ? 'Add' : 'Save'?>"><? if (empty($_GET['hide_header'])) { ?>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type=button class=black_btn value='Back' onClick="window.history.back(1);"><? } ?></td></tr>
	</table>
	
	</div>
</div>

<script language=javascript>

function ShowPopupMessage(id)
{
	if (id == 0) ShowToolTip("Website URL: The URL of the website you want to add to your links directory.");
	if (id == 1) ShowToolTip("Website title: The text that will be linked to the website's URL.");
	if (id == 2) ShowToolTip("Website Description: The description of the website.");
	if (id == 3) ShowToolTip("Choose Category: The links category that the website will be added to");
	if (id == 4) ShowToolTip("Reciprocal URL: The location on your website that contains a link back to the Website URL");
}

function goRecip()
{
	var URL = document.getElementsByName('m_recip')[0].value;

	if (URL.indexOf('http://') == 0 && URL.length > 7)
		window.open(URL);
}

</script>
