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
<? if (empty($_GET['hide_header'])) { ?>
	  <h1>Categories</h1><br><br><br>
<? } ?>
<?
	include "func_generate_lpages.php";

	if (!empty($_GET['update']))
	{
		$id     = (empty($_POST['id'    ])) ? 0 : $_POST['id'    ];
		$parent = (empty($_POST['parent'])) ? (empty($id) ? 1 : 0) : $_POST['parent'];
		$title  = $_POST['title']; if (!get_magic_quotes_gpc()) $title = addslashes($title);

		if ($id == 0) 
		{
			dbQuery("INSERT INTO ".$m_DB_prefix."category SET parent='".$parent."', title='".$title."'");

			$id = dbFetch("SELECT LAST_INSERT_ID()");
			$id = $id[0];
		} else
			dbQuery("UPDATE ".$m_DB_prefix."category SET parent='".$parent."', title='".$title."' WHERE id='".$id."'");

		GenerateLinksPage($parent  );
		GenerateLinksPage($id, true);

//		die("<script language=javascript> document.location= 'admin.php?IFLM=".$IFLM."&page=categs&force_upd=".rand()."'; </script>");
	}

	if (!empty($_GET['delete']))
	{
		$pid    = array($_GET['delete']);
		$parent = dbFetch("SELECT parent FROM ".$m_DB_prefix."category WHERE id='".$_GET['delete']."'");

		for ($i=0; $i<count($pid); $i++)
		{
			$children = dbQuery("SELECT id FROM ".$m_DB_prefix."category WHERE parent='".$pid[$i]."'");
			while ($row = dbFetch($children))
				$pid[] = $row[0];

			dbQuery("DELETE FROM ".$m_DB_prefix."category WHERE id='".$pid[$i]."'");
			dbQuery("DELETE FROM ".$m_DB_prefix."links WHERE added_to='".$pid[$i]."'");
		}

		GenerateLinksPage($parent[0]);
	}

	if (!empty($_GET['regenerate_all']))
		GenerateLinksPage(1, true);

	$categs = array();
	$max_level = 0;

	$categs_in_db = dbQuery("SELECT id, parent, title FROM ".$m_DB_prefix."category ORDER BY parent, title, id");
	while ($row = dbFetch($categs_in_db))
	{
		if ($row[1] == 0) $level = 0;
		else for ($i=0; $i<count($categs); $i++)
			if ($categs[$i][0] == $row[1])
			{
				$level = $categs[$i][4]+1;
			}

		$max_level = max($max_level, $level);
		$categs[] = array($row[0], $row[1], $row[2], "", $level);
	}


	echo "<table width=100% cellspacing=0 cellpadding=1 border=0>";
	


function DrawCateg($parent, $nfo)
{
	global $max_level, $categs, $m_DB_prefix, $IFLM;
	@set_time_limit(30);

	$local  = array();
	for ($i=0; $i<count($categs); $i++)
		if ($categs[$i][1] == $parent)
			$local[] = $i;


	for ($q=0; $q<count($local); $q++)
	{
		echo "<tr>";

//		if ($i) echo "<tr><td colspan=".($max_level+2)." style='background-color: #000000' height=1></td>";

		$i = $local[$q];

		for ($j=1; $j<count($nfo); $j++)
			if ($nfo[$j]) echo "<td style='background-image:url(img/dir_norm.gif)' width=0%><img src='img/spacer.gif' width=12 height=1></td>";
			else          echo "<td style='background-image:none' width=0%><img src='img/spacer.gif' width=12 height=1></td>";

		if ($categs[$i][4])
			if ($q == count($local)-1)
			     echo "<td style='background-image:url(img/dir_sub_end.gif)' width=0%><img src='img/spacer.gif' width=12 height=1></td>";
			else echo "<td style='background-image:url(img/dir_sub.gif)' width=0%><img src='img/spacer.gif' width=12 height=1></td>";

		$count = dbFetch("SELECT COUNT(id) FROM ".$m_DB_prefix."links WHERE added_to='".$categs[$i][0]."'");
		$count = (empty($count[0]) ? "" : "<a href='admin.php?IFLM=".$IFLM."&page=links&parent=".$categs[$i][0]."'>(".$count[0].")</a>");

		echo "<td colspan=".($max_level-count($nfo)+1)." width=100%><a href='admin.php?IFLM=".$IFLM."&page=edit_categ&id=".$categs[$i][0]."'>".$categs[$i][2]."</a> ".$count."</td>";
		echo "<td align=right style='font-size: x-small;' width=0%><nobr>";
		if ($categs[$i][0] != 1) echo "<a href='admin.php?IFLM=".$IFLM."&page=edit_categ&id=".$categs[$i][0]."'>Edit</a> | ";
		if ($categs[$i][0] == 1) echo "<a href='admin.php?IFLM=".$IFLM."&page=edit_categ&parent=1'>Add category</a>";
		else	                 echo "<a href='admin.php?IFLM=".$IFLM."&page=edit_categ&parent=".$categs[$i][0]."'>Add subcateg</a> | ";
		if ($categs[$i][0] != 1) echo "<a href='admin.php?IFLM=".$IFLM."&page=categs&delete=".$categs[$i][0]."' onClick='return confirm(\"Are you sure you want to delete this category?\\nAny links and categories under this category will be deleted !\")'>Delete</a>";
//				                 echo "<a href='admin.php?IFLM=".$IFLM."&page=order_categ&parent=".$categs[$i][0]."'>Sort links</a></nobr></td>";

		echo "</tr>";
		
		array_push($nfo, (($q == count($local)-1) ? 0 : 1));
			DrawCateg($categs[$i][0], $nfo);
		array_pop($nfo);
	}
}

	DrawCateg(0, array());

	echo "</table>";
?>
		<br><br><br><br><br><center><a href='admin.php?IFLM=<?=$IFLM;?>&page=categs&regenerate_all=1'>Recreate all links pages</a></center>
	</div>
</div>