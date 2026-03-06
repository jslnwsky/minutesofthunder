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
	include "func_generate_lpages.php";

	echo "<h1>Options</h1><br><br><br>";

	if (!empty($_GET['update']))
	{ 
		$m_sugestedLinkURL_new   = $_POST['m_sugestedLinkURL_new'   ]; if (!get_magic_quotes_gpc()) $m_sugestedLinkURL       = addslashes($m_sugestedLinkURL       );
		$m_sugestedLinkTitle     = $_POST['m_sugestedLinkTitle'     ]; if (!get_magic_quotes_gpc()) $m_sugestedLinkTitle     = addslashes($m_sugestedLinkTitle     );
		$m_sugestedLinkDesc      = $_POST['m_sugestedLinkDesc'      ]; if (!get_magic_quotes_gpc()) $m_sugestedLinkDesc      = addslashes($m_sugestedLinkDesc      );
		
		$m_LinksPerPage          = $_POST['m_LinksPerPage'          ]; if (!get_magic_quotes_gpc()) $m_LinksPerPage          = addslashes($m_LinksPerPage          );
		$m_LinksOrder            = $_POST['m_LinksOrder'            ]; if (!get_magic_quotes_gpc()) $m_LinksOrder            = addslashes($m_LinksOrder            );
		$m_CategsOrder           = $_POST['m_CategsOrder'           ]; if (!get_magic_quotes_gpc()) $m_CategsOrder           = addslashes($m_CategsOrder           );
		$m_SubCategsOrder        = $_POST['m_SubCategsOrder'        ]; if (!get_magic_quotes_gpc()) $m_SubCategsOrder        = addslashes($m_SubCategsOrder        );
		$m_SubCategsListType     = $_POST['m_SubCategsListType'     ]; if (!get_magic_quotes_gpc()) $m_SubCategsListType     = addslashes($m_SubCategsListType     );

		$m_pageShowLinkIndex     = (!empty($_POST['m_pageShowLinkIndex'     ]) ? 1 : 0);
		$m_pageShowLinkCount     = (!empty($_POST['m_pageShowLinkCount'     ]) ? 1 : 0);
		$m_pageShowSubcategs     = (!empty($_POST['m_pageShowSubcategs'     ]) ? 1 : 0);

		$m_pageCategFont         = $_POST['m_pageCategFont'         ]; if (!get_magic_quotes_gpc()) $m_pageCategFont         = addslashes($m_pageCategFont         );
		$m_pageCategSize         = $_POST['m_pageCategSize'         ]; if (!get_magic_quotes_gpc()) $m_pageCategSize         = addslashes($m_pageCategSize         );
		$m_pageCategColor        = $_POST['m_pageCategColor'        ]; if (!get_magic_quotes_gpc()) $m_pageCategColor        = addslashes($m_pageCategColor        );
		$m_pageCategCSS_class    = $_POST['m_pageCategCSS_class'    ]; if (!get_magic_quotes_gpc()) $m_pageCategCSS_class    = addslashes($m_pageCategCSS_class    );
		$m_pageCategCSS_style    = $_POST['m_pageCategCSS_style'    ]; if (!get_magic_quotes_gpc()) $m_pageCategCSS_style    = addslashes($m_pageCategCSS_style    );

		$m_pageSubCategFont      = $_POST['m_pageSubCategFont'      ]; if (!get_magic_quotes_gpc()) $m_pageSubCategFont      = addslashes($m_pageSubCategFont      );
		$m_pageSubCategSize      = $_POST['m_pageSubCategSize'      ]; if (!get_magic_quotes_gpc()) $m_pageSubCategSize      = addslashes($m_pageSubCategSize      );
		$m_pageSubCategColor     = $_POST['m_pageSubCategColor'     ]; if (!get_magic_quotes_gpc()) $m_pageSubCategColor     = addslashes($m_pageSubCategColor     );
		$m_pageSubCategCSS_class = $_POST['m_pageSubCategCSS_class' ]; if (!get_magic_quotes_gpc()) $m_pageSubCategCSS_class = addslashes($m_pageSubCategCSS_class );
		$m_pageSubCategCSS_style = $_POST['m_pageSubCategCSS_style' ]; if (!get_magic_quotes_gpc()) $m_pageSubCategCSS_style = addslashes($m_pageSubCategCSS_style );

		$m_pageLinkFont          = $_POST['m_pageLinkFont'          ]; if (!get_magic_quotes_gpc()) $m_pageLinkFont          = addslashes($m_pageLinkFont          );
		$m_pageLinkSize          = $_POST['m_pageLinkSize'          ]; if (!get_magic_quotes_gpc()) $m_pageLinkSize          = addslashes($m_pageLinkSize          );
		$m_pageLinkColor         = $_POST['m_pageLinkColor'         ]; if (!get_magic_quotes_gpc()) $m_pageLinkColor         = addslashes($m_pageLinkColor         );
		$m_pageLinkCSS_class     = $_POST['m_pageLinkCSS_class'     ]; if (!get_magic_quotes_gpc()) $m_pageLinkCSS_class     = addslashes($m_pageLinkCSS_class     );
		$m_pageLinkCSS_style     = $_POST['m_pageLinkCSS_style'     ]; if (!get_magic_quotes_gpc()) $m_pageLinkCSS_style     = addslashes($m_pageLinkCSS_style     );

		if (strpos($m_sugestedLinkURL_new, "http://") === false) $m_sugestedLinkURL_new = "http://".$m_sugestedLinkURL_new;

		$old_server = substr($m_sugestedLinkURL    , 7, strpos($m_sugestedLinkURL    ."/", "/", 8)-7);
		$new_server = substr($m_sugestedLinkURL_new, 7, strpos($m_sugestedLinkURL_new."/", "/", 8)-7);

		if ($old_server == $new_server)
			$m_sugestedLinkURL = $m_sugestedLinkURL_new;
		else echo "<font color=red><b>WARNING</b>: You are not allowed to change the server of the 'Request link URL' field. This needs to point to a page on your site!</font>";

		$resave = true;
	}

	if (!empty($_GET['update_lm']))
	{ 
		$m_sugestedLinkURL       = $_GET['mU']; if (!get_magic_quotes_gpc()) $m_sugestedLinkURL       = addslashes($m_sugestedLinkURL       );
		$m_sugestedLinkTitle     = $_GET['mT']; if (!get_magic_quotes_gpc()) $m_sugestedLinkTitle     = addslashes($m_sugestedLinkTitle     );
		$m_sugestedLinkDesc      = $_GET['mD']; if (!get_magic_quotes_gpc()) $m_sugestedLinkDesc      = addslashes($m_sugestedLinkDesc      );

		if (strpos($m_sugestedLinkURL, "http://") === false) $m_sugestedLinkURL = "http://".$m_sugestedLinkURL;

		$resave = true;
	}

	if (!empty($resave))
	{
		$config = "<?\n// WARNING ! DO NOT MODIFY THIS FILE\n// Use the editor in the admin pannel !!!\n\n";
		$config .= "  \$m_sugestedLinkURL    = \"$m_sugestedLinkURL\";\n";
		$config .= "  \$m_sugestedLinkTitle  = \"$m_sugestedLinkTitle\";\n";
		$config .= "  \$m_sugestedLinkDesc   = \"$m_sugestedLinkDesc\";\n\n";

		$config .= "  \$m_LinksPerPage       = \"$m_LinksPerPage\";\n";
		$config .= "  \$m_LinksOrder         = \"$m_LinksOrder\";\n";
		$config .= "  \$m_CategsOrder        = \"$m_CategsOrder\";\n\n";
		$config .= "  \$m_SubCategsOrder     = \"$m_SubCategsOrder\";\n\n";
		$config .= "  \$m_SubCategsListType  = \"$m_SubCategsListType\";\n\n";

		$config .= "  \$m_pageShowLinkIndex  = \"$m_pageShowLinkIndex\";\n";
		$config .= "  \$m_pageShowLinkCount  = \"$m_pageShowLinkCount\";\n";
		$config .= "  \$m_pageShowSubcategs  = \"$m_pageShowSubcategs\";\n\n";

		$config .= "  \$m_pageCategFont      = \"$m_pageCategFont\";\n";
		$config .= "  \$m_pageCategSize      = \"$m_pageCategSize\";\n";
		$config .= "  \$m_pageCategColor     = \"$m_pageCategColor\";\n";
		$config .= "  \$m_pageCategCSS_class = \"$m_pageCategCSS_class\";\n";
		$config .= "  \$m_pageCategCSS_style = \"$m_pageCategCSS_style\";\n\n";

		$config .= "  \$m_pageSubCategFont      = \"$m_pageSubCategFont\";\n";
		$config .= "  \$m_pageSubCategSize      = \"$m_pageSubCategSize\";\n";
		$config .= "  \$m_pageSubCategColor     = \"$m_pageSubCategColor\";\n";
		$config .= "  \$m_pageSubCategCSS_class = \"$m_pageSubCategCSS_class\";\n";
		$config .= "  \$m_pageSubCategCSS_style = \"$m_pageSubCategCSS_style\";\n\n";

		$config .= "  \$m_pageLinkFont      = \"$m_pageLinkFont\";\n";
		$config .= "  \$m_pageLinkSize      = \"$m_pageLinkSize\";\n";
		$config .= "  \$m_pageLinkColor     = \"$m_pageLinkColor\";\n";
		$config .= "  \$m_pageLinkCSS_class = \"$m_pageLinkCSS_class\";\n";
		$config .= "  \$m_pageLinkCSS_style = \"$m_pageLinkCSS_style\";\n";

		$config .= "?>";

		// save to file
		if (!($f = @fopen('../my_config.php', "wt")))
		{
			echo "Cannot save config file (write permissions for ".substr($m_localServerURL, 7, strpos($m_localServerURL, '/', 7)-7)."my_config.php not set to 777)";
		} else {
			fwrite($f, $config);

			fclose($f);

			GenerateLinksPage(1, true);
		}
	}

?>

<form action='admin.php?IFLM=<?=$IFLM;?>&page=dir_style&update=1&hide_header=<?=!empty($_GET['hide_header']);?>' method=post>
	<table cellspacing=0 cellpadding=5 align=center border=0>

		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(0);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Request link URL:</td><td colspan=2>
				<input name=m_sugestedLinkURL_new style='width:300px' value='<?=htmlspecialchars(stripcslashes($m_sugestedLinkURL), ENT_QUOTES);?>'></td></tr>

		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(1);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Request link Title:</td><td colspan=2>
				<input name=m_sugestedLinkTitle style='width:300px' value='<?=htmlspecialchars(stripcslashes($m_sugestedLinkTitle), ENT_QUOTES);?>'></td></tr>

		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(2);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Request link Description:</td><td colspan=2>
				<input name=m_sugestedLinkDesc style='width:300px' value='<?=htmlspecialchars(stripcslashes($m_sugestedLinkDesc), ENT_QUOTES);?>'></td></tr>

		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(3);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Links per page:</td><td colspan=2>
				<select name=m_LinksPerPage style='width:300px'>
					<option value=30<?  if ($m_LinksPerPage ==  30) echo " selected";?>>30
					<option value=40<?  if ($m_LinksPerPage ==  40) echo " selected";?>>40
					<option value=50<?  if ($m_LinksPerPage ==  50) echo " selected";?>>50 (default)
					<option value=75<?  if ($m_LinksPerPage ==  75) echo " selected";?>>75
					<option value=100<? if ($m_LinksPerPage == 100) echo " selected";?>>100
				</select></td></tr>
		
		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(4);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Links display order:</td><td colspan=2>
				<select name=m_LinksOrder style='width:300px'>
					<option value=0<?  if ($m_LinksOrder ==  0) echo " selected";?>>Oldest links first
					<option value=1<?  if ($m_LinksOrder ==  1) echo " selected";?>>Newest links first
					<option value=2<?  if ($m_LinksOrder ==  2) echo " selected";?>>Alphabetical Order
				</select></td></tr>

		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(5);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Category display order:</td><td colspan=2>
				<select name=m_CategsOrder style='width:300px'>
					<option value=0<?  if ($m_CategsOrder ==  0) echo " selected";?>>Order by rows
					<option value=1<?  if ($m_CategsOrder ==  1) echo " selected";?>>Order by columns
				</select></td></tr>

		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(11);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Subcategory display order:</td><td colspan=2>
				<select name=m_SubCategsOrder style='width:300px'>
					<option value=0<?  if ($m_SubCategsOrder ==  0) echo " selected";?>>Order by title
					<option value=1<?  if ($m_SubCategsOrder ==  1) echo " selected";?>>Order by total links
				</select></td></tr>

		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(12);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Subcategory list type:</td><td colspan=2>
				<select name=m_SubCategsListType style='width:300px'>
					<option value=0<?  if ($m_SubCategsListType ==  0) echo " selected";?>>Top  3, inline
					<option value=1<?  if ($m_SubCategsListType ==  1) echo " selected";?>>Top  5, inline
					<option value=2<?  if ($m_SubCategsListType ==  2) echo " selected";?>>Top 10, inline
					<option value=3<?  if ($m_SubCategsListType ==  3) echo " selected";?>>All subcategories, inline
					
					<option value=4<?  if ($m_SubCategsListType ==  4) echo " selected";?>>Top  3, in a list
					<option value=5<?  if ($m_SubCategsListType ==  5) echo " selected";?>>Top  5, in a list
					<option value=6<?  if ($m_SubCategsListType ==  6) echo " selected";?>>Top 10, in a list
					<option value=7<?  if ($m_SubCategsListType ==  7) echo " selected";?>>All subcategories, in a list
				</select></td></tr>

		<tr><td valign=top align=left></td><td colspan=2>
				<input type=checkbox name='m_pageShowLinkIndex' value=1<? if ($m_pageShowLinkIndex) echo " checked";?>>Show category link index<br>
				<input type=checkbox name='m_pageShowLinkCount' value=1<? if ($m_pageShowLinkCount) echo " checked";?>>Show category link count<br>
				<input type=checkbox name='m_pageShowSubcategs' value=1<? if ($m_pageShowSubcategs) echo " checked";?>>Show subcategories under the main category<br>
			</td></tr>
		
		<tr><td colspan=3>&nbsp;</td></tr>
		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(7);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Category formatting:</td>
				<td>Font:</td><td><select name=m_pageCategFont style='width:250px'>
					<option value=''<?            if ($m_pageCategFont == ''           ) echo " selected";?>>(default)
					<option value='Arial'<?       if ($m_pageCategFont == 'Arial'      ) echo " selected";?>>Arial
					<option value='Courier'<?     if ($m_pageCategFont == 'Courier'    ) echo " selected";?>>Courier
					<option value='Courier New'<? if ($m_pageCategFont == 'Courier New') echo " selected";?>>Courier New
					<option value='Helvetica'<?   if ($m_pageCategFont == 'Helvetica'  ) echo " selected";?>>Helvetica
					<option value='Geneva'<?      if ($m_pageCategFont == 'Geneva'     ) echo " selected";?>>Geneva
					<option value='Sans-Serif'<?  if ($m_pageCategFont == 'Sans-Serif' ) echo " selected";?>>Sans-Serif
					<option value='Serif'<?       if ($m_pageCategFont == 'Serif'      ) echo " selected";?>>Serif
					<option value='Times'<?       if ($m_pageCategFont == 'Times'      ) echo " selected";?>>Times
					<option value='Tahoma'<?      if ($m_pageCategFont == 'Tahoma'     ) echo " selected";?>>Tahoma
					<option value='Verdana'<?     if ($m_pageCategFont == 'Verdana'    ) echo " selected";?>>Verdana
				</select></td></tr><tr><td></td>
				<td>Size:</td><td><select name=m_pageCategSize style='width:250px'>
					<option value=''<?  if ($m_pageCategSize ==  '') echo " selected";?>>(default)
					<option value='2'<? if ($m_pageCategSize == '2') echo " selected";?>>2 (default)
					<option value='3'<? if ($m_pageCategSize == '3') echo " selected";?>>3
					<option value='4'<? if ($m_pageCategSize == '4') echo " selected";?>>4
				</select></td></tr><tr><td></td>
				<td>Color:    </td><td><input name=m_pageCategColor     style='width:250px' value='<?=htmlspecialchars(stripcslashes($m_pageCategColor    ), ENT_QUOTES);?>'></td></tr><tr><td></td>
				<td>CSS class:</td><td><input name=m_pageCategCSS_class style='width:250px' value='<?=htmlspecialchars(stripcslashes($m_pageCategCSS_class), ENT_QUOTES);?>'></td></tr><tr><td></td>
				<td>CSS style:</td><td><input name=m_pageCategCSS_style style='width:250px' value='<?=htmlspecialchars(stripcslashes($m_pageCategCSS_style), ENT_QUOTES);?>'></td></tr>

		<tr><td colspan=3>&nbsp;</td></tr>
		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(8);' align=absmiddle onMouseMove='this.style.cursor="hand";'>SubCategory formatting:</td>
				<td>Font:</td><td><select name=m_pageSubCategFont style='width:250px'>
					<option value=''<?            if ($m_pageSubCategFont == ''           ) echo " selected";?>>(default)
					<option value='Arial'<?       if ($m_pageSubCategFont == 'Arial'      ) echo " selected";?>>Arial
					<option value='Courier'<?     if ($m_pageSubCategFont == 'Courier'    ) echo " selected";?>>Courier
					<option value='Courier New'<? if ($m_pageSubCategFont == 'Courier New') echo " selected";?>>Courier New
					<option value='Helvetica'<?   if ($m_pageSubCategFont == 'Helvetica'  ) echo " selected";?>>Helvetica
					<option value='Geneva'<?      if ($m_pageSubCategFont == 'Geneva'     ) echo " selected";?>>Geneva
					<option value='Sans-Serif'<?  if ($m_pageSubCategFont == 'Sans-Serif' ) echo " selected";?>>Sans-Serif
					<option value='Serif'<?       if ($m_pageSubCategFont == 'Serif'      ) echo " selected";?>>Serif
					<option value='Times'<?       if ($m_pageSubCategFont == 'Times'      ) echo " selected";?>>Times
					<option value='Tahoma'<?      if ($m_pageSubCategFont == 'Tahoma'     ) echo " selected";?>>Tahoma
					<option value='Verdana'<?     if ($m_pageSubCategFont == 'Verdana'    ) echo " selected";?>>Verdana
				</select></td></tr><tr><td></td>
				<td>Size:</td><td><select name=m_pageSubCategSize style='width:250px'>
					<option value=''<?  if ($m_pageSubCategSize ==  '') echo " selected";?>>(default)
					<option value='2'<? if ($m_pageSubCategSize == '2') echo " selected";?>>2
					<option value='3'<? if ($m_pageSubCategSize == '3') echo " selected";?>>3
					<option value='4'<? if ($m_pageSubCategSize == '4') echo " selected";?>>4
				</select></td></tr><tr><td></td>
				<td>Color:    </td><td><input name=m_pageSubCategColor     style='width:250px' value='<?=htmlspecialchars(stripcslashes($m_pageSubCategColor    ), ENT_QUOTES);?>'></td></tr><tr><td></td>
				<td>CSS class:</td><td><input name=m_pageSubCategCSS_class style='width:250px' value='<?=htmlspecialchars(stripcslashes($m_pageSubCategCSS_class), ENT_QUOTES);?>'></td></tr><tr><td></td>
				<td>CSS style:</td><td><input name=m_pageSubCategCSS_style style='width:250px' value='<?=htmlspecialchars(stripcslashes($m_pageSubCategCSS_style), ENT_QUOTES);?>'></td></tr>

		<tr><td colspan=3>&nbsp;</td></tr>
		<tr><td valign=top align=left><img src='img/q.gif' onClick='ShowPopupMessage(9);' align=absmiddle onMouseMove='this.style.cursor="hand";'>Link formatting:</td>
				<td>Font:</td><td><select name=m_pageLinkFont style='width:250px'>
					<option value=''<?            if ($m_pageLinkFont == ''           ) echo " selected";?>>(default)
					<option value='Arial'<?       if ($m_pageLinkFont == 'Arial'      ) echo " selected";?>>Arial
					<option value='Courier'<?     if ($m_pageLinkFont == 'Courier'    ) echo " selected";?>>Courier
					<option value='Courier New'<? if ($m_pageLinkFont == 'Courier New') echo " selected";?>>Courier New
					<option value='Helvetica'<?   if ($m_pageLinkFont == 'Helvetica'  ) echo " selected";?>>Helvetica
					<option value='Geneva'<?      if ($m_pageLinkFont == 'Geneva'     ) echo " selected";?>>Geneva
					<option value='Sans-Serif'<?  if ($m_pageLinkFont == 'Sans-Serif' ) echo " selected";?>>Sans-Serif
					<option value='Serif'<?       if ($m_pageLinkFont == 'Serif'      ) echo " selected";?>>Serif
					<option value='Times'<?       if ($m_pageLinkFont == 'Times'      ) echo " selected";?>>Times
					<option value='Tahoma'<?      if ($m_pageLinkFont == 'Tahoma'     ) echo " selected";?>>Tahoma
					<option value='Verdana'<?     if ($m_pageLinkFont == 'Verdana'    ) echo " selected";?>>Verdana
				</select></td></tr><tr><td></td>
				<td>Size:</td><td><select name=m_pageLinkSize style='width:250px'>
					<option value=''<?  if ($m_pageLinkSize ==  '') echo " selected";?>>(default)
					<option value='2'<? if ($m_pageLinkSize == '2') echo " selected";?>>2
					<option value='3'<? if ($m_pageLinkSize == '3') echo " selected";?>>3
					<option value='4'<? if ($m_pageLinkSize == '4') echo " selected";?>>4
				</select></td></tr><tr><td></td>
				<td>Color:    </td><td><input name=m_pageLinkColor     style='width:250px' value='<?=htmlspecialchars(stripcslashes($m_pageLinkColor    ), ENT_QUOTES);?>'></td></tr><tr><td></td>
				<td>CSS class:</td><td><input name=m_pageLinkCSS_class style='width:250px' value='<?=htmlspecialchars(stripcslashes($m_pageLinkCSS_class), ENT_QUOTES);?>'></td></tr><tr><td></td>
				<td>CSS style:</td><td><input name=m_pageLinkCSS_style style='width:250px' value='<?=htmlspecialchars(stripcslashes($m_pageLinkCSS_style), ENT_QUOTES);?>'></td></tr>

		<tr><td colspan=3 align=center><br><input type=submit class=black_btn value="Save"></td></tr>

</table>
	
	</div>
</div>

<script language=javascript>

function ShowPopupMessage(id)
{
	if (id ==  0) ShowToolTip("The URL that will be included on your link request form within your link directory");
	if (id ==  1) ShowToolTip("The anchor text that will be used when people link to your website");
	if (id ==  2) ShowToolTip("The description of your website, which will be displayed below your anchor text when people link to your website");
	if (id ==  3) ShowToolTip("The number of links displayed on each of your links pages");
	if (id ==  4) ShowToolTip("The order the links will be displayed on each of your links pages");
	if (id ==  5) ShowToolTip("The order the categories will will be displayed on each of your links pages");
	if (id ==  6) ShowToolTip("");
	if (id ==  7) ShowToolTip("Allows you to change the look and feel of your category pages");
	if (id ==  8) ShowToolTip("Allows you to change the look and feel of your Subcategory pages");
	if (id ==  9) ShowToolTip("Allows you to change the look and feel of your links to other websites");
	if (id == 10) ShowToolTip("");
	if (id == 11) ShowToolTip("The sort order of the subcategories under each category");
	if (id == 12) ShowToolTip("How many subcategories to show, and in what manner");
}

function goRecip()
{
	var URL = document.getElementsByName('m_recip')[0].value;

	if (URL.indexOf('http://') == 0 && URL.length > 7)
		window.open(URL);
}

</script>
