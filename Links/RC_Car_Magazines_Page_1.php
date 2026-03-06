<?php include("../Includes/Configure.php"); ?>
<html>
	<head>
		<title>Links | RC Car Magazines Page 1</title>
		<META http-equiv="Content-Type"	content="text/html; charset=windows-1252">
		<meta name="Creator"			content="Kotzakoliou, SSA - http://www.niche-mania.com">
		<meta name="Copyright"			content="<?=$CopyRight;?>">
		<meta name="Description"		content="RC Car Magazines Related Links - Page 1 - ">
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
						<b>RC Car Magazines Related Links - Page 1 </b>
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
						<ul class='ulCategory'><li><A href="http://www.rccartalk.com/rc-car-magazines.html" target='_blank'>RC Car Magazines And R/C Car Magazine Subscriptions...</A><br><p>RC Car Magazines Radio Control Car Action Magazine, RC Nitro, R/C Car Magazine, and more... RC Car Action, RC Nitro, and R/C Car Magazine are the three largest and best selling printed rc car magazines. ... </P></li><li><A href="http://www.rccartalk.com/rc-nitro.html" target='_blank'>Best Radio Controlled Car Magazines - RC Nitro Magazine</A><br><p>In fact, RC Car Action is about $30 bucks for a one year subscription but you can subscribe to RC Nitro magazine here for only $19.95. </P></li></ul>
						<br>
						<br>
						<Center><font color='CCCCCC'>Back</font> | 1 | <a href='RC_Car_Magazines_Page_2.php'>2</a> | <a href='RC_Car_Magazines_Page_3.php'>3</a> | <a href='RC_Car_Magazines_Page_2.php'>Next</a><br><br></center>
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
					<?php include($Domain."Includes/NewsFeed.php?CAT=RC+Car+Magazines"); ?>
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

