<?php include("../Includes/Configure.php"); ?>
<html>
	<head>
		<title>RC Car Action | The Magazine With All The RC Car Action </title>
		<META http-equiv="Content-Type"	content="text/html; charset=windows-1252">
		<meta name="Creator"			content="Kotzakoliou, SSA - http://www.niche-mania.com">
		<meta name="Copyright"			content="<?=$CopyRight;?>">
		<meta name="Description"		content="The Magazine With All The RC Car Action  - If you're into radio controlled cars then you're probably also enthusiastic about racing.  Let me make another guess: you probably also enjoy modifying your vehicle(s), and certainly like to talk to other RC enthusiasts about all of the latest RC events.  ">
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
						<b>The Magazine With All The RC Car Action  </b>
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
						If you're into radio controlled cars then you're probably also enthusiastic about racing.  Let me make another guess: you probably also enjoy modifying your vehicle(s), and certainly like to talk to other RC enthusiasts about all of the latest RC events.  If this is all so, then you'll want to feel a part of the community by buying an RC-related magazine.  One of the greatest of these is RC Car Action.<br><br>RC Car Action is a magazine absolutely dedicated to the buying, racing, building, fixing, comparing, and upgrading of radio controlled vehicles.  Published twelve times a year, this periodical is shipped for free exclusively in the United States (though that too may change as the RC craze expands further).<br><br>RC Car Action is absolutely stuffed with gobs of information and high resolution photos that really let you understand what is being described with a crisp clarity that'll make you want to jump up immediately and spend all of your money on a new RC vehicle.  Yet the complete package is not the only view, as every detail of these mini autos is discussed.  This includes (but is by no means limited to) radio receivers and transceivers, servos, batteries, tires, struts, bodies, chargers, and even special paint brands that will make your vehicle look the absolute best.<br><br>Further, this magazine publishes an excellent buyer's guide for anyone thinking about making a new purchase.  The present edition is 260 pages at a street price of $9.99.  This guide will help a buyer to understand the tips necessary to making an intelligent purchase.<br><br>Additionally, there are other factors to consider with such a purchase, which the guide addresses.  This includes accessories that will properly work with each vehicle, how to clean and upgrade a vehicle, racing tricks and strategies, and engine troubleshooting, to name but a few areas of expertise within the pages of Car Action.<br><br>So, as your enthusiasm rages, or if you know someone who is a RC fan, this magazine makes a great gift which will come monthly to continue the excitement.<br><br><br><br><br><br>
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
					<?php include($Domain."Includes/NewsFeed.php?CAT=RC+Car+Action"); ?>
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

