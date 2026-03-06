<?
// *********************************************************************
//
// LinkMetro Web Solutions
//
// Source Copyright 2004-2006 Bryxen Software
// Unauthorized reproduction or editing is not allowed !
//
// *********************************************************************

if ($m_mysql_host != "" && @mysql_connect($m_mysql_host, $m_mysql_user, $m_mysql_pass))
	if ($m_DB_name != "") @mysql_select_db($m_DB_name);

// ------------------------------------------------------------
//if (empty($m_LinkTemplate          )) $m_LinkTemplate           = "#INDEX#. <b><a href='#URL#' target=_blank>#TITLE#</a></b><br>#DESC<br><br>\n";
//if (empty($m_CategoryTemplate      )) $m_CategoryTemplate       = "<font face=Arial size=2><a href='#URL#' style='color:#0055AA'><b>#TITLE#</b></a></font> #COUNT#\n#SUBCATEGS#<br>";
//if (empty($m_SubCategTemplate      )) $m_SubCategTemplate       = "  <font face=Arial size=1><a href='#URL#' style='color:#0000FF'>#TITLE# #COUNT#</a></font>";
//if (empty($m_CategoryTemplateHeader)) $m_CategoryTemplateHeader = "<font face=Arial size=2><a href='#URL#' style='color:#0055AA'><b>#TITLE#</b></a></font> &gt; ";

if (file_exists('../my_config.php'))
	include '../my_config.php';

if (!isset($m_LinksPerPage          )) $m_LinksPerPage           = 30;
if (!isset($m_LinksOrder            )) $m_LinksOrder             =  0;
if (!isset($m_CategsOrder           )) $m_CategsOrder            =  0;
if (!isset($m_SubCategsOrder        )) $m_SubCategsOrder         =  1;
if (!isset($m_SubCategsListType     )) $m_SubCategsListType      =  0;

if (!isset($m_pageShowLinkIndex     )) $m_pageShowLinkIndex      =  1;
if (!isset($m_pageShowLinkCount     )) $m_pageShowLinkCount      =  1;
if (!isset($m_pageShowSubcategs     )) $m_pageShowSubcategs      =  1;

if (!isset($m_pageCategFont         )) $m_pageCategFont          =  "Arial";
if (!isset($m_pageCategSize         )) $m_pageCategSize          =   0;
if (!isset($m_pageCategColor        )) $m_pageCategColor         =  '#0055AA';
if (!isset($m_pageCategCSS_class    )) $m_pageCategCSS_class     =  '';
if (!isset($m_pageCategCSS_style    )) $m_pageCategCSS_style     =  'font-weight: bold; font-size: 9pt;';

if (!isset($m_pageSubCategFont      )) $m_pageSubCategFont       =  "Arial";
if (!isset($m_pageSubCategSize      )) $m_pageSubCategSize       =   0;
if (!isset($m_pageSubCategColor     )) $m_pageSubCategColor      =  '#0000FF';
if (!isset($m_pageSubCategCSS_class )) $m_pageSubCategCSS_class  =  '';
if (!isset($m_pageSubCategCSS_style )) $m_pageSubCategCSS_style  =  'font-size: 8pt;';

if (!isset($m_pageLinkFont          )) $m_pageLinkFont           =  "Arial";
if (!isset($m_pageLinkSize          )) $m_pageLinkSize           =   0;
if (!isset($m_pageLinkColor         )) $m_pageLinkColor          =  '#0055AA';
if (!isset($m_pageLinkCSS_class     )) $m_pageLinkCSS_class      =  '';
if (!isset($m_pageLinkCSS_style     )) $m_pageLinkCSS_style      =  'font-size: 8pt;';

if (!isset($linkmetroURL            )) $linkmetroURL             = 'http://www.linkmetro.com';
$m_proxy_set_server = "";
$m_proxy_set_port   = 80;

$m_scriptVersion    = "1.6";

if (strpos($m_sugestedLinkURL, "http://") === false) $m_sugestedLinkURL = "http://".$m_sugestedLinkURL;

// ------------------------------------------------------------
function dbQuery($string, $DB_name = "")
{
	$res = mysql_query($string);

	if (mysql_errno())
		echo "<br><b>MySQL query string:</b><br>".$string."<br><b>Reported error</b>: ".mysql_error();

	return $res;
}

function dbFetch($resource)
{
	if (is_string($resource))
	{
		$resource = dbQuery($resource);

		$res = mysql_fetch_row($resource);

		mysql_free_result($resource);

		return $res;
	} else
		return mysql_fetch_row($resource);
}

// ------------------------------------------------------------
function FormatStrInt($str)
{
	$out = $str."";
	$i   = strlen($out) - 3;

	for (; $i>0; $i-=3)
		$out = substr_replace($out, "'", $i, 0);

	return $out;
}

// ------------------------------------------------------------
function makeURL_from_categ($title, $id, $page = 0)
{
	global $m_localServerURL;

	if ($id == 1)
	{
		if ($page == 0) return "index.htm";
		else            return "index".$page.".htm";
	} else {
		$ret = strtolower($title);

		for ($i=0; $i<strlen($ret); $i++)
			if (!ctype_alnum($ret[$i]))
				$ret[$i] = '_';


		if ($page) return $ret.'['.$id.']-'.$page.'.htm';
		else       return $ret.'['.$id.'].htm';
	}
}

// ------------------------------------------------------------
function file_get_contents_me($filename)
{
   $fd = fopen($filename, "rb");
   $content = fread($fd, filesize($filename));
   fclose($fd);
   return $content;
}


// ------------------------------------------------------------
function file_get_contents_http($URL, $debug=0, $full_header=0)
{
	global $m_proxy_set_server, $m_proxy_set_port;
	@set_time_limit(30);

	$i = strpos($URL, '/', 7);

	if ($debug) echo "<br><br>".$URL."<br>";

	if (empty($m_proxy_set_server))
	{
		if ($debug) echo "Connecting to server... <br>";

		$f1 = @fsockopen(substr($URL, 7, $i-7), 80, $errno, $errstr, 30);
		
		if (!$f1)
		{
			if ($debug) echo "Cannot get socket<br>";
			return false;
		}

		fputs ($f1, "GET ".substr($URL, $i)." HTTP/1.0\r\n".
					 "Host: ".substr($URL, 7, $i-7)."\r\n\r\n");
	} else {
		if ($debug) echo "Connecting thru proxy... <br>";

		$f1 = @fsockopen($m_proxy_set_server, $m_proxy_set_port, $errno, $errstr, 30);
		
		if (!$f1)
		{
			if ($debug) echo "Cannot get socket<br>";
			return false;
		}

		fputs ($f1, "GET ".$URL." HTTP/1.0\r\n".
					 "Host: ".substr($URL, 7, $i-7)."\r\n\r\n");
	}

	if ($debug) echo "Downloading... ";
	$input = "";
	while (!feof($f1))
	   $input .= fgets ($f1, 256);

	fclose($f1);

	if ($debug) echo strlen($input)." bytes done<br>";

	if ($debug) echo "<textarea rows=20 cols=80>".htmlspecialchars($input)."</textarea>";

	if ( $full_header )  return             $input;
	else                 return trim(strstr($input, "\r\n\r\n"));

}

?>