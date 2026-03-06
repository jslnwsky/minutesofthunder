<?php include("../Includes/Configure.php"); ?>
<html>
	<head>
		<title>RC Car Racing | RC Car Racing And IFMAR</title>
		<META http-equiv="Content-Type"	content="text/html; charset=windows-1252">
		<meta name="Creator"			content="Kotzakoliou, SSA - http://www.niche-mania.com">
		<meta name="Copyright"			content="<?=$CopyRight;?>">
		<meta name="Description"		content="RC Car Racing And IFMAR - RC car racing, or radio/remote controlled car racing is the sport of pitting miniature versions of both real and fantasy -type automobiles against one another.  This can include not only cars but also trucks, SUV's, tanks, and whatever else the human imagi">
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
						<b>RC Car Racing And IFMAR </b>
						<br>
						<b>
							<small>
								Michalis '<b>BIG Mike</b>' Kotzakolios<br><small><a href=http://www.niche-mania.com target=_new>Kotzakoliou, SSA</a></small>
							</small>
						</b>
						<br>
						<br>
					</p>
					<?php include("../Includes/Google_336x280.php"); ?>
					<p>
						RC car racing, or radio/remote controlled car racing is the sport of pitting miniature versions of both real and fantasy -type automobiles against one another.  This can include not only cars but also trucks, SUV's, tanks, and whatever else the human imagination can produce.  In addition to the many types of vehicles that can be raced against one another, the types of tracks, their length, obstacles, and other such possibilities exist, making RC car racing exciting and ever expansive.<br><br>The governing body of RC car racing is IFMAR -the International Federation of Model Auto Racing.  This body authority was created in 1979 by Ted Longshaw.  It governs throughout the world, administering the rules, regulations, and other specifications to this form of racing, including rules regarding construction of the cars.  At present its membership stands at 42 countries, though is continuing to grow each year.<br><br>One of the means by which IFMAR is able to delegate responsibilities on a global scale is through four affiliate groupings, EFRA, FAMAR, FEMCA, and ROAR, all of which form a tight democratically-run confederation. EFRA is the European Federation of RC cars and oversees Austria, Belgium, Croatia, Czech Republic, Denmark, Estonia, Finland, France, Germany, Great Britain, Greece, Holland, Hungary, Ireland, Italy, Luxembourg, Monaco, Norway, Poland, Portugal, Romania, Russia, Slovak Republic, Slovenia, Spain, Sweden, and Switzerland.  <br><br>FAMAR, the Fourth Association of Model Auto Racing is the youngest of the four groups and continues to encompass new countries into its jurisdiction.  Some of these countries are Argentina, Brazil, Mexico, South Africa, Uruguay, and Venezuela. <br><br>FEMCA stands for Far East Model Car Association and maintains Australia, Brunei, China, Hong Kong, Indonesia, Japan, South Korea, Macau, Malaysia, New Zealand, Singapore, Taiwan, Thailand, and The Philippines.  The last group, ROAR, governs the United States and Canada and to date has tendered the most world champions.<br><br>Each group in this confederation has equal voting rights within the RC car racing family. By the IFMAR constitution, not only is each group of equal footing, but acts as a bulwark and symbol of good will, fair competition, and friendship throughout the planet.<br><br><br>
						<br>
						<br>
						
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
					<?php include($Domain."Includes/NewsFeed.php?CAT=RC+Car+Racing"); ?>
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

