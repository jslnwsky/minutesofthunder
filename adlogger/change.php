<?php
session_start();
include ("./config_database.php");
include ("./config_settings.php");

$ref = "./settings.php";
$go = $_GET['go'];

/*
$_SESSION['changesuccess'] = "All changes have been disallowed in the demo.";
header("Location: $ref");
exit;
*/

if ($go == "addchannel") {

	$chan_name = addslashes($_POST['chan_name']);
	$chan_desc = addslashes($_POST['chan_desc']);
	mysql_query("INSERT INTO adlog_channels
		SET 
		chan_name='$chan_name',
		chan_desc='$chan_desc'
	")
	or die(mysql_error());
	$_SESSION['changesuccess'] = "Your channel has been added successfully.";
	
} elseif ($go == "setcookie") {

	setcookie("adsclicked", 100, time()+32000000, "/"); //expires after 1 year
	$_SESSION['changesuccess'] = "You have successfully disabled ads for yourself.";
	
} elseif ($go == "unsetcookie") {

	setcookie ("adsclicked", "", time()-32000000, "/");
	$_SESSION['changesuccess'] = "You have successfully enabled ads for yourself.";

} elseif ($go == "dropchannel") {

	$channel_id = $_GET['id'];
	mysql_query("DELETE FROM adlog_channels WHERE id='$channel_id'")
	or die(mysql_error());
	$_SESSION['changesuccess'] = "Your channel has been deleted successfully.";

} elseif ($go == "userpass") {

	$user = $_POST['user'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	
	$password_hash = sha1($password1);

		if ($password1 == $password2 && $user != '' && $password1 != '') {
			mysql_query("UPDATE adlog_users SET
			username='$user',
			password='$password_hash'
			")
			or die(mysql_error());
			$_SESSION['changesuccess'] = "Your username/password has been changed successfully.";
		} else {
			$_SESSION['changesuccess'] = "Unable to change the username and password. Please fill out all fields.";
			header("Location: $ref");
			exit;
		}

} elseif ($go == "dropyourself") {
	
	$ip_delete = $_POST['ip_delete'];
	mysql_query("DELETE FROM adlog_logfiles WHERE visitor_ip='$ip_delete'")
	or die(mysql_error());
	$num_rows = mysql_affected_rows();
	$_SESSION['changesuccess'] = "You have successfully deleted $num_rows instances of $ip_delete from your logs.";
	
} elseif ($go == "changesettings") {
	
$email = $_POST['email'];
$emailnotice = $_POST['emailnotice'];
$emailalert = $_POST['emailalert'];
$update_stable = $_POST['stable'];
$update_beta = $_POST['beta'];
$clickmax = $_POST['clickmax'];
$clickmaxtime = $_POST['clickmaxtime'];
$ip_db_check = $_POST['ip_db_check'];
$bannedips = $_POST['bannedips'];
$bannedips = preg_split('/[\\s]+/', $bannedips);
$bannedstring = "";
foreach($bannedips as $i => $ip){
   if ($i != 0) {
      $bannedstring .= ",\n";
   }
   $bannedstring .= "\"$ip\"";
}

if ($clickmax == '') $clickmax = 99;
if ($clickmaxtime == '') $clickmaxtime = 1;

//add variables to config_settings.php
$newfile = fopen("./config_settings.php", "w");

if (!$newfile) {
echo "config_settings.php was unable to be opened.  Verify that permissions are set to 666.";
exit;
}

$file_contents = <<<EOD
<?php
/*/////////////////////////////////////////////////////
You can change these through your administration panel.
*//////////////////////////////////////////////////////

\$email = "$email"; // Your email address for notifications and lost password

\$email_notice = "$emailnotice"; // Notice on every click? (y or n)

\$email_alert = "$emailalert"; // Alert on multiple click? (y or n)

\$update_stable = "$update_stable"; // Notice on new stable version? (y or n)

\$update_beta = "$update_beta"; // Notice on new beta version? (y or n)

\$clickmax = "$clickmax"; // Number of clicks allowed per visitor

\$clickmaxtime = $clickmaxtime * 3600; // Time in which that visitor can click those ads (in seconds)

\$ip_db_check = "$ip_db_check"; // If using the PHP wrapping code, should the script check the visitor's IP against the database?

\$ip_range_ban_list = array(
$bannedstring
);

\$version_num = "1.11";

?>
EOD;

fwrite($newfile, "$file_contents");
fclose($newfile);

// End of writing config_settings.php file
//

$_SESSION['changesuccess'] = "You have successfully updated your script settings.";


} elseif ($go == "Delete") {

	mysql_query("DELETE FROM adlog_logfiles")
	or die(mysql_error());
	$num_rows1 = mysql_affected_rows();
	mysql_query("DELETE FROM adlog_adblock")
	or die(mysql_error());
	$num_rows2 = mysql_affected_rows();
	$num_rows = $num_rows1 + $num_rows2;
	$_SESSION['changesuccess'] = "You have successfully deleted $num_rows log entries.";
	
} elseif ($go == "dropyourself_block") {
	
	$ip_delete = $_POST['ip_delete'];
	mysql_query("DELETE FROM adlog_adblock WHERE visitor_ip='$ip_delete'")
	or die(mysql_error());
	$num_rows = mysql_affected_rows();
	$_SESSION['changesuccess'] = "You have successfully deleted $num_rows instances of $ip_delete from your block logs.";


} else {

	echo "<h1>Error: No action has been specified.</h1>";
	exit;

}
header("Location: $ref");
exit;
?>