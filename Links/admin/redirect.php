<?
	if (empty($_GET['URL']) && empty ($_GET['url']))
	{
		header("HTTP/1.0 404 Not Found");
		return;
	}

	if (!empty($_GET['URL'])) $url = $_GET['URL']; else $url = $_GET['url'];
	if (substr($url, 0, 7) != "http://") $url = "http://".$url;
	
?>
<form action="<?=$url;?>" method=get name=m_form></form>

<script language=javaScript>
	document.getElementsByName('m_form')[0].submit();
</script>

