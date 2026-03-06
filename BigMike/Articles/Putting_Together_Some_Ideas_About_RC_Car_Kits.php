<?php include("../Includes/Configure.php"); ?>
<html>
	<head>
		<title>RC Cars | Radio Control Cars</title>
		<META http-equiv="Content-Type"	content="text/html; charset=windows-1252">
		<meta name="Creator"			content="Kotzakoliou, SSA - http://www.niche-mania.com">
		<meta name="Copyright"			content="<?=$CopyRight;?>">
		<meta name="Description"		content="Putting Together Some Ideas About RC Car Kits  - Looking for a new hobby, got some moolah to blow, or simply interested in expanding your horizons? Then consider the world of RC, or radio controlled vehicles.  This encompasses any type of vehicle that you can think of -including planes, helicopters, subm">
		<meta name="Keywords"			content="<?=$Keywords;?>">
		<meta name="Distribution"		content="global">
		<meta name="Publisher"			content="<?=$Domain;?>">
		<meta name="Rating"				content="General">
		<meta name="Revisit-after"		content="5 days">
		<meta name="Robots"				content="index,follow">
		<link href="../Includes/Styles.css" rel="stylesheet" type="text/css">
        <style type="text/css">
<!--
.style1 {font-size: 10pt}
-->
        </style>
</head>
	<body>
<table align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="tdHeader" colspan="2">&nbsp; </td>
  </tr>
  <tr>
    <td colspan="2" class="tdRow">
      <?php include("../Includes/Menu.php"); ?>
    </td>
  </tr>
  <tr>
    <td class="tdContent"> <br>
        <h1> <b> RC Car Kits </b> - Some ideas</h1>
        <p> <b> <small> Michalis '<b>BIG Mike</b>' Kotzakolios</small></b><br>
        </p>
        <?php include("../Includes/Google_336x280.php"); ?>
        <h2 class="style1"> RC Cars as a new hobby</h2>
<p> Cash burning a hole in your pocket, or simply interested in expanding your horizons? Then consider the world of <strong>RC cars</strong>, or any type of <strong>radio control</strong> vehicle. This encompasses any vehicle that you can think of -including planes, helicopters, submarines and boats; yet this usually means cars or trucks, which are the most popular vehicles in the RC world. For this you will want to look into <strong>RC car kits.</strong><br>
            <br>
          RC car kits come in not only different car models and for different types of racing, but in different levels of performance and quality. A word to the wise is to begin at a lower level and as interest in the hobby expands, purchase better quality cars accordingly.<br>
          <br>
          Of course, RC cars can be purchased already assembled. This will usually cost more money, however, and reduces the pleasure factor for some people. As well, it diminishes the owner's desire and ability to make upgrades as time goes by and making upgrades (called tweaking) is half the fun. For these reasons, most people choose to purchase RC car kits.<br>
          <br>
          Standard RC car kits can be purchased for a price anywhere between $150 and $300. As with all things, you get what you pay for. However, there are good deals out there, so shop around and you may get a worthy bargain. As well, your search may go beyond the environs of the general hobby enthusiast store. Other venues for finding these kits include newspapers, RC magazines, and even auctions. Of course the greatest source for RC cars -whether new or used, retail or wholesale, is the internet. EBay, for example, is a wonderful venue for used RC cars. Clicking on the featured links at the top of or the Amazon.com links at the bottom of this page are great places to start your search.<br>
          <br>
          Of course, as mentioned before, there are cheaper prices to be had, for rc cars of a lesser quality. If your intention is merely to play around in your neighborhood, possibly racing your friend's RC car, then this may be the way to go. Otherwise, consider the heftier investment, particularly if you like to tinker about in the garage, which is a wonderful added bonus to this exciting hobby.<br>
          <br>
          <br>
  
          <?php	
						if ($DisplayAmazon)
							{
								echo "<br><center>";
								include("../Includes/Amazon_468x60.php");
								echo "</center><br>";
							}
					?>
        </p></td>
    <td class="tdRight">
      <?php include("../Includes/Navigation.php"); ?>
      <?php include("../Includes/Google_160x600.php"); ?>
    </td>
  </tr>
  <tr>
    <td class="tdRow" colspan="2">
      <?=$Category;?>
      News and Events </td>
  </tr>
  <tr>
    <td colspan="2">
      <?php include("../Includes/Google_Search.php"); ?>
</table>		
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
		<span class="tdFooter">	| RC Cars</span> 
	</body>
</html>

