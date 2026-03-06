<title>AdLogger Admin</title>
</head>
<?php
if($_SESSION['adminglog'] == "y") {
   echo '<body>';
} else {
   echo '<body onload="document.getElementById(\'loginbox\').focus();">';
}
?>
<!-- For non-visual user agents: -->
<div id="top"><a href="#main-copy" class="doNotDisplay doNotPrint">Skip to main content.</a></div>
<!-- ##### Header ##### -->
<div id="header">
  <div class="superHeader">
    <div class="right"> | <a href="./logout.php">Logout</a> | </div>
  </div>
  <div class="midHeader">
    <h1 class="headerTitle">AdLogger Admin Page</h1>
  </div>
  <div class="subHeader"> <span class="doNotDisplay">Navigation:</span> <a href="./">Performance Overview</a> | <a href="./archive.php">Archive Data </a> | <a href="./best.php">Performance Data </a> | <a href="./clickinfo.php">Click Info </a> | <a href="./blockinfo.php">Blocked Info </a> | <a href="./codegen.php">Code Generator</a>| <a href="./settings.php">Settings</a> | <a href="./support.php">Support</a></div>
</div>