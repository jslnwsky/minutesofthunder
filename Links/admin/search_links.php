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

	$URL      = (!empty($_GET['URL'     ])) ? $_GET['URL'     ] : ""; if (!get_magic_quotes_gpc()) $URL = addslashes($URL);
	$cur_page = (!empty($_GET['cur_page'])) ? $_GET['cur_page'] : 0;
	$parent   = (!empty($_GET['parent'  ])) ? $_GET['parent'  ] : 0;

	$patern = $URL;
	for ($i=0; $i<strlen($patern); $i++)
	{
		if (!ctype_alnum($patern[$i]))
						 $patern[$i] = "%";
	}
	$patern = str_replace("%%", "%", $patern);

	include "links_update_codes.php";


?><div id="main-copy">
  <div class="twoThirds noBorderOnLeft">
<? if (empty($_GET['hide_header'])) { ?>
	  <h1>Search for "<?=stripslashes($URL);?>"</h1><br><br><br>
<? } ?>


<table width=100% cellpadding=0 cellspacing=0 border=0><tr><td align=center>
<form action="admin.php" method='get'>
	<input type=hidden name=IFLM value='<?=$IFLM;?>'>
	<input type=hidden name=page value='search_links'>
	Search for URL: <input name=URL style='width:200px' value='<?=htmlspecialchars(stripslashes($URL), ENT_QUOTES);?>'> <input type=submit value="Go">
</form>
</td></tr></table>

<?
	//
	$count = dbFetch("SELECT COUNT(id) FROM ".$m_DB_prefix."links WHERE CONCAT(URL, email, `desc`, title, linkback_on ) LIKE '%$patern%'");

	$links = dbQuery("SELECT id, lm_id, URL, `desc`, title, added_at, added_to, linkback_on, linkback_act, last_check, visible FROM ".$m_DB_prefix."links ".
						" WHERE CONCAT(URL, email, `desc`, title, linkback_on ) LIKE '%$patern%' ORDER BY visible=-1 DESC, visible DESC, added_at DESC"
					.   " LIMIT ".($cur_page*$mesages_per_page).", ".$mesages_per_page
					);
?>
	<table width=100% border=0 cellspacing=1 cellpadding=2>
<tr><th colspan=4><b>View Links: <?= min($cur_page*$mesages_per_page+1, $count[0])." to ".min(($cur_page+1)*$mesages_per_page, $count[0]); ?></b></td></tr>	
	<tr>
	    <th align=center><b>Website Title, Description, Date added</b></th>
		<th align=center><b>Website URL, Link Status, Category</b></th>
		<th>&nbsp;</th>
	</tr>
<?
	while ($row = dbFetch($links))
	{
		$categ = dbFetch("SELECT title, parent FROM ".$m_DB_prefix."category WHERE id='".$row[6]."'");
		$categ_title = $categ[0];
		while ($categ[1] != 0)
		{
			$categ = dbFetch("SELECT title, parent FROM ".$m_DB_prefix."category WHERE id='".$categ[1]."'");

			if ($categ[1] == 0) $categ[0] = "";
			$categ_title = $categ[0]." > ".$categ_title;
		}


		echo "<tr><td valign=top>";
		if ($row[10] == 0) echo "<i>";

			echo "<b>".$row[4]."</b><br>".$row[3]."<br>".$row[5];

			if ($row[1] != 0)
				echo "<br><a href='".$linkmetroURL."/send_pm.php?id=".$row[1]."' target=_blank>&lt;send private-message&gt;</a>";

		if ($row[10] == 0)echo "</i>";
		echo "</td><td valign=top>";
		if ($row[10] == 0)echo "<i>";

			echo "<a href='".$row[2]."' target=_blank>".$row[2]."</a><br>";

			if ($row[8]) echo "<a href='".$row[7]."' style='color:green' target=_blank>Has link back</a>";
			else         echo "No link back";

			echo " | ";
			if ($row[10] == -1) echo "Waiting approval";
			if ($row[10] ==  0) echo "Hidden";
			if ($row[10] ==  1) echo "Visible";

		if ($row[10] == 0) echo "</i>";

		echo "<br><a href='admin.php?IFLM=".$IFLM."&page=links&parent=".$row[6]."'>".$categ_title."</a>";
		echo "</td><td valign=top align=center>";
		
		                    echo "<a href='admin.php?IFLM=".$IFLM."&page=edit_link&id="        .$row[0]                   ."&URL=".urlencode($URL)."&cur_page=".$cur_page."'><nobr>&lt; edit &gt;</nobr></a> &nbsp;";
		if ($row[10] ==  1) echo "<a href='admin.php?IFLM=".$IFLM."&page=search_links&hide="   .$row[0]."&parent=".$row[6]."&URL=".urlencode($URL)."&cur_page=".$cur_page."'><nobr>&lt; hide &gt;</nobr></a><br>";
		if ($row[10] ==  0) echo "<a href='admin.php?IFLM=".$IFLM."&page=search_links&unhide=" .$row[0]."&parent=".$row[6]."&URL=".urlencode($URL)."&cur_page=".$cur_page."'><nobr>&lt; unhide &gt;</nobr></a><br>";
	    if ($row[ 7] != "") echo "<a href='admin.php?IFLM=".$IFLM."&page=search_links&check="  .$row[0]."&parent=".$row[6]."&URL=".urlencode($URL)."&cur_page=".$cur_page."'><nobr>&lt; check linkback &gt;</nobr></a><br>";
	                        echo "<a href='admin.php?IFLM=".$IFLM."&page=search_links&del="    .$row[0]."&parent=".$row[6]."&URL=".urlencode($URL)."&cur_page=".$cur_page."' onClick='return confirm(\"Are you sure you want to remove ".$row[2]."?\");'><nobr>&lt; delete &gt;</nobr></a><br>";
		if ($row[10] == -1) echo "<a href='admin.php?IFLM=".$IFLM."&page=search_links&approve=".$row[0]."&parent=".$parent."&cur_page=".$cur_page."'><nobr>&lt; approve &gt;</nobr></a><br>";

		echo "</td></tr>";
	}

	if ($count[0] > $mesages_per_page)
	{
		echo "<tr><td colspan=3 align=right>Go to page: ";

        $min = max(0, min($count[0] - $mesages_per_page*10, $cur_page-5));
		$max = min($count[0], $min + $mesages_per_page*10);

		for ($i=$min; $i<$max; $i+=$mesages_per_page)
		{
			if ($i != $min) echo ", ";

			if (floor($i / $mesages_per_page) == $cur_page) echo "<b>".floor($i / $mesages_per_page+1)."</b>";
			else echo "<a href='admin.php?IFLM=".$IFLM."&page=".$page."&URL=".urlencode($URL)."&cur_page=".floor($i / $mesages_per_page)."'><u>".floor($i / $mesages_per_page+1)."</u></a>";
		}

		echo "</td></tr>";
	}

	if ($count[0] == 0)
	{
		echo "<tr><td colspan=3 align=center> No links found with that search term(s) </td></tr>";
	}
?>

</table>
<br><br><br><center><button type=button class=black_btn onClick='window.location.href="admin.php?IFLM=<?=$IFLM;?>&page=edit_link";'>Add Link</button></center>
	</div>
</div>
