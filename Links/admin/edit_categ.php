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
	  <h1><?
		
		if (!empty($_GET['id']    )) $id     = $_GET['id']    ; else $id     = 0;
		if (!empty($_GET['parent'])) $parent = $_GET['parent']; else $parent = 1;

		if (!empty($id))
		{
			$parent = dbFetch("SELECT parent, title FROM ".$m_DB_prefix."category WHERE id='$id'");
			$title  = addslashes($parent[1]);
			$parent = $parent[0];
		} else $title = "";

		if (empty($id)) if ($parent <= 1) echo "Add category";  else echo "Add subcategory";
		else            if ($parent <= 1) echo "Edit category"; else echo "Edit subcategory";
	  

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
	$web_categ = $parent;
	GenerateCategoryListing(0, "");

	  ?></h1><br><br><br>
<br><br>
<form action='admin.php?IFLM=<?=$IFLM;?>&page=categs&update=1' method=post>
	<table cellspacing=0 cellpadding=5 align=center>
	<? if ($parent) { ?>
		<tr><td valign=top align=right>Category parent:</td><td>
				<select name=parent style='width:200px'<? if (empty($id)) echo " disabled"; ?>><?=$categories;?></select></td></tr>
	<? } ?>
				<input type=hidden name='id' value='<?=$id;?>'>
				<input type=hidden name='parent' value='<?=$parent;?>'>
		<tr><td valign=top align=right>Category title:</td><td><input type=text maxlength=100 name=title style='width:200px' value='<?=$title;?>'></td></tr>
		<tr><td colspan=2 height=1><img src='img/spacer.gif' height=5></td></tr>
		<tr><td colspan=2 align=center><input type=submit class=black_btn value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type=button class=black_btn value='Back' onClick="document.location='admin.php?IFLM=<?=$IFLM;?>&page=categs';"></td></tr>
	</table>
	
</form>

	</div>
</div>