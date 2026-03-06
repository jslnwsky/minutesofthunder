<?php include("../Includes/Configure.php"); ?>
<html>
	<head>
		<title>RC Cars | Index of Articles</title>
		<META http-equiv="Content-Type"	content="text/html; charset=windows-1252">
		<meta name="Creator"			content="Kotzakoliou, SSA - http://www.niche-mania.com">
		<meta name="Copyright"			content="<?=$CopyRight;?>">
		<meta name="Description"		content="Index of all Articles in the RC Cars Category - RC Cars">
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
						<b>Index of all Articles in the RC Cars Category </b>
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
						<ul class='ulCategory'><li><a href='Getting_Started_With_Radio_Control_Cars.php' title='Click here to read Getting Started With Radio Control Cars from the RC Cars Category...'>Getting Started With Radio Control Cars</a><br><br><p>Take note that you need to decide whether you want a radio control nitro or gas car or perhaps one that has an electric engine. You could purchase either one which is ready to run (rtr) or a kit. Now, knowing how much you would want to spend start going<br><a href='Getting_Started_With_Radio_Control_Cars.php' title='Click here to read Getting Started With Radio Control Cars from the RC Cars Category...'><small>Read More...</small></a></li><br><br><li><a href='Mini_Rc_Cars.php' title='Click here to read Mini Rc Cars from the RC Cars Category...'>Mini Rc Cars</a><br><br><p>Did your heart ever palpitate for fast driving? Did you ever imagine your hands controlling an extremely speedy car? I f so, then you should definitely experience the gravity and true charm of mini RC cars.</p>

<p>Mini RC cars have climbed up to the <br><a href='Mini_Rc_Cars.php' title='Click here to read Mini Rc Cars from the RC Cars Category...'><small>Read More...</small></a></li><br><br><li><a href='An_Abundance_Of_RC_Cars.php' title='Click here to read An Abundance Of RC Cars from the RC Cars Category...'>An Abundance Of RC Cars</a><br><br>Ever been walking down the street and heard a high-pitched whirring noise?  It's so high pitched that you know it can't be a car or motorcycle -and then it happens.  Suddenly a small remote controlled automobile zips by you.  Or maybe the owner has a littl<br><a href='An_Abundance_Of_RC_Cars.php' title='Click here to read An Abundance Of RC Cars from the RC Cars Category...'><small>Read More...</small></a></li><br><br></ul>
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
					<?php include($Domain."Includes/NewsFeed.php?CAT=RC+Cars"); ?>
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

