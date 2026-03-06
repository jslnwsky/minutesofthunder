<?
// *********************************************************************
// Modify the content of this file at your own risk !
//
// *********************************************************************

// -- START --
$m_mysql_host = "localhost";
$m_mysql_user = "wwwmins";
$m_mysql_pass = "broom12";

$m_DB_name = "wwwmins_motlinks";
$m_DB_prefix = "lmlinks_";

$m_sugestedLinkURL   = "www.minutesofthunder.com";
$m_sugestedLinkTitle = "RC Cars | Radio Control Cars";
$m_sugestedLinkDesc  = "This site provides comprehensive information for Radio control car enthusiasts, as well as for people interested in getting into the hobby.";
$m_localTemplate = "../template.htm";

$m_LM_code = "CTFE44WG";
// -- END --


$m_localServerURL =  "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$m_localServerURL = substr($m_localServerURL, 0, strrpos($m_localServerURL, '/'));
$m_localServerURL = substr($m_localServerURL, 0, strrpos($m_localServerURL, '/')+1);

// ------------------------------------------------------------------------------------------------
?>