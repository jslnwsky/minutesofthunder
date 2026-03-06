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
	  <h1>Current site statistics</h1><br><br><br>
<?
	$count  = dbFetch("SELECT COUNT(id) FROM ".$m_DB_prefix."links WHERE visible=1");
	$count2 = dbFetch("SELECT COUNT(id) FROM ".$m_DB_prefix."links WHERE visible=0");
	echo "<p><b>Total links</b>: $count[0] visible and $count2[0] hidden</p>";

	$count  = dbFetch("SELECT COUNT(id) FROM ".$m_DB_prefix."links WHERE linkback_on != '' AND visible=1 AND linkback_act");
	$count2 = dbFetch("SELECT COUNT(id) FROM ".$m_DB_prefix."links WHERE linkback_on != '' AND visible=0 AND linkback_act");
	echo "<p><b>Total links with backlink</b>: $count[0] visible and $count2[0] hidden</p>";

	$count  = dbFetch("SELECT COUNT(id) FROM ".$m_DB_prefix."links WHERE visible=-1");
	echo "<p><b>Total links waiting approval</b>: $count[0]";
	
	if ($count[0] > 0) echo "&nbsp;&nbsp;&nbsp;<a href='admin.php?IFLM=".$IFLM."&page=links&rev=1'>view list</a>";

	echo "</p>";

	$count = dbFetch("SELECT COUNT(id) FROM ".$m_DB_prefix."category");
	echo "<p><b>Total categories</b>: $count[0]</p>";
?>
	</div>
</div>