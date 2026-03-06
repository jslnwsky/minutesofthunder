<?php include("../Includes/Configure.php"); ?>
<html>
	<head>
		<title>Links | RC Car Kits Page 1</title>
		<META http-equiv="Content-Type"	content="text/html; charset=windows-1252">
		<meta name="Creator"			content="Kotzakoliou, SSA - http://www.niche-mania.com">
		<meta name="Copyright"			content="<?=$CopyRight;?>">
		<meta name="Description"		content="RC Car Kits Related Links - Page 1 - ">
		<meta name="Keywords"			content="<?=$Keywords;?>">
		<meta name="Distribution"		content="global">
		<meta name="Publisher"			content="<?=$Domain;?>">
		<meta name="Rating"				content="General">
		<meta name="Revisit-after"		content="5 days">
		<meta name="Robots"				content="index,follow">
		<link href="../Includes/Styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<table align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td class="tdHeader" colspan="2">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2" class="tdRow">
					<?php include("../Includes/Menu.php"); ?>
				</td>
			</tr>
			<tr>
				<td class="tdContent">
					<br>
					<p>
						<b>RC Car Kits Related Links - Page 1 </b>
						<br>
						<b>
							<small>
								
							</small>
						</b>
						<br>
						<br>
					</p>
					<?php include("../Includes/Google_336x280.php"); ?>
					<p>
						<ul class='ulCategory'><li><A href="http://www.rccartalk.com/hpi-racing.html" target='_blank'>Best HPI Racing RC Car Kits</A><br><p>Buying, tuning, and racing HPI Racing kits like the HPI Savage 21 and HPI Dash. HPI Racing RC Car Reviews... HPI Racing is well known for its high quality ready to run rc cars and race ready kits like ... </P></li><li><A href="http://www.rccartalk.com/" target='_blank'>RC CAR TALK- Radio Control RC Cars, R/C Trucks, Free Magazine, SHOP ... </A><br><p>All about electric rc cars, nitro gas powered rc cars, and toy remote control cars and trucks with rc car videos, articles, and honest reviews.</P></li></ul>
						<br>
						<br>
						<Center><font color='CCCCCC'>Back</font> | 1 | <a href='RC_Car_Kits_Page_2.php'>2</a> | <a href='RC_Car_Kits_Page_3.php'>3</a> | <a href='RC_Car_Kits_Page_2.php'>Next</a><br><br></center>
					</p>
					<br>
					<?php	
						if ($DisplayAmazon)
							{
								echo "<br><center>";
								include("../Includes/Amazon_468x60.php");
								echo "</center><br>";
							}
					?>					
				</td>
				<td class="tdRight">
					<?php include("../Includes/Navigation.php"); ?>
					<?php include("../Includes/Google_160x600.php"); ?>
				</td>
			</tr>
			<tr>
				<td class="tdRow" colspan="2">
					<?=$Category;?> News and Events
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php include("../Includes/Google_Search.php"); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
					<?php include($Domain."Includes/NewsFeed.php?CAT=RC+Car+Kits"); ?>
					<?php	
						if ($DisplayAmazon)
							{
								echo "<br><center>";
								include("../Includes/Amazon_728x90.php");
								echo "</center><br>";
							}
					?>
				</td>
			</tr>
			<tr>
				<td class="tdFooter" colspan="2">
					&copy; <?=date("Y");?>, <a href="<?=$Domain;?>"><?=$SiteName;?></a> - All Rights Reserved Worldwide | <a href="../Legal/index.php"><?=$Category;?> Legal Information</a>
				</td>
			</tr>
		</table>
	</body>
</html>

