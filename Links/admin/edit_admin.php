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
	  <h1><?=(($update_acc) ? "View":"Add");?> admin account</h1>
<br>
<?
	$m_user = dbFetch("SELECT user, name, `type` FROM ".$m_DB_prefix."users WHERE ID=".$update_acc);
?>
<form action="admin.php?IFLM=<?=$IFLM;?>&page=users&update=<?=$update_acc;?>" method="post">
<table border=0 cellspacing=1>
<tr bgcolor=#DDDDDD><td style='padding:4px'>User account name:</td><td style='padding:4px'><input type=text     value="<?=$m_user[0];?>" style='width:150px' name='mn_user'></td></tr>
<tr bgcolor=#EEEEEE><td style='padding:4px'>User account pass:</td><td style='padding:4px'><input type=password value="dummy_password"   style='width:150px' name='mn_pass'></td></tr>
<tr bgcolor=#DDDDDD><td style='padding:4px'>User real name:</td><td style='padding:4px'><input    type=text     value="<?=$m_user[1];?>" style='width:150px' name='mn_name'></td></tr>
<tr bgcolor=#EEEEEE><td style='padding:4px' colspan=2 align=center>
<input type=<?=((!$user_type || $user_id == 1) ? "hidden":"checkbox");?> value='1' name=mn_type <? if ($m_user[2]) echo " checked"; ?>>Administrator rights</td></tr>
<tr bgcolor=#FFFFFF><td style='padding:4px' colspan=2 align=center><input type=submit value="<?=(($update_acc) ? "Update":"Add");?> account" class=black_btn>
</td></tr>
</table></form>
<br>
   </div>
</div>
