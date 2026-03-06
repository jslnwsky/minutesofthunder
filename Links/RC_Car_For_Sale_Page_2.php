<?php include("../Includes/Configure.php"); ?>
<html>
	<head>
		<title>Links | RC Car For Sale Page 2</title>
		<META http-equiv="Content-Type"	content="text/html; charset=windows-1252">
		<meta name="Creator"			content="Kotzakoliou, SSA - http://www.niche-mania.com">
		<meta name="Copyright"			content="<?=$CopyRight;?>">
		<meta name="Description"		content="RC Car For Sale Related Links - Page 2 - ">
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
				<td class="tdHeader" colspan="2">&nbsp;
					
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
						<b>RC Car For Sale Related Links - Page 2 </b>
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
				  <ul class='ulCategory'><li><A href="http://www.nitro-gas-rc.com/nitro-gas-rc-car-and-truck-for-sale.html" target='_blank'>Nitro gas rc car for sale + SPECIALS</A><br><p>... nitro gas rc car for sale + cheap rc car and cheap rc truck specials. They come brand-new from HobbyTron and eHobbies with full-warranty . ( For the rc trucks, scroll down this page ). 4 Reasons we ... </P></li>
						  <li><a href="http://www.warrantyheadquarters.com" target="_blank"><b>Extended Warranty</b></a> Warranty Headquarters provides affordable extended warranties so you never have to worry about unexpected and costly repair bills.</li>
						</ul>
						<br>
						<br>
						<Center><a href='RC_Car_For_Sale_Page_1.php'>Back</a> | <a href='RC_Car_For_Sale_Page_1.php'>1</a> | 2 | <a href='RC_Car_For_Sale_Page_3.php'>3</a> | <a href='RC_Car_For_Sale_Page_3.php'>Next</a><br><br></center>
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
					<?php include($Domain."Includes/NewsFeed.php?CAT=RC+Car+For+Sale"); ?>
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

