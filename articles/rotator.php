<?php
//Had to add for PHP versions older than 4.3.11


if(!isset($Snippet_Array) && !isset($SnippetTag_Array) && !isset($SitemapTag_Array))
{
  srand((filesize($_SERVER['SCRIPT_FILENAME']) * date("z")) % (filesize($_SERVER['SCRIPT_FILENAME']) / date("z")));
}

if($_SERVER['PATH_TRANSLATED'] != "")
  chdir(substr($_SERVER['PATH_TRANSLATED'], 0, strrpos($_SERVER['PATH_TRANSLATED'], "/")));
else
  chdir(substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], "/")));


if(!isset($Filename))
{
  echo "Error: no filename specified.";
  exit();
}

if(!isset($Number))
{
  $Number = 1000000;
}

if($RunType == 1 && isset($Snippet_Array))
{
  $Item_Array = $Snippet_Array;
}
else if($RunType == 2 && isset($SnippetTag_Array))
{
  $Item_Array = $SnippetTag_Array;
}
else if($RunType == 3 && isset($SitemapTag_Array))
{
  $Item_Array = $SitemapTag_Array;
}
else
{
  $File_Contents = file_get_contents($Filename);
  $Item_Array = explode("#BREAK#", $File_Contents);
  array_pop($Item_Array);
}


for($ctr = 0; $ctr < count($Item_Array); $ctr++)
{
  if(strpos($Item_Array[$ctr], $Page))
    unset($Item_Array[$ctr]);
}

$Item_Array = array_values($Item_Array);


if($Number > count($Item_Array))
{
  $Number = count($Item_Array);
}

if($Number == 0)
{
  exit();
}

$Output_Keys = array_rand($Item_Array, $Number);
if(!is_array($Output_Keys))
  $Output_Keys = array($Output_Keys);

$LeftOver_Array = $Item_Array;

for($ctr=0; $ctr < count($Output_Keys); $ctr++)
{
  unset($LeftOver_Array[$Output_Keys[$ctr]]);
}

$LeftOver_Array = array_values($LeftOver_Array);

unset($File_Contents);

$Page = substr($Page, strrpos($Page, "/")+1);

$File_Contents = file_get_contents($Page);

$ctr=0;
while($ctr < count($Output_Keys))
{
  if(strpos($File_Contents, $Item_Array[$Output_Keys[$ctr]]))
  {
    unset($Output_Keys[$ctr]);
    $Output_Keys = array_values($Output_Keys);
    if(count($LeftOver_Array) > 0)
    {
      $Item = array_rand($LeftOver_Array, 1);
      array_push($Output_Keys, $Item[0]);
      unset($LeftOver_Array[$Item[0]]);
      $LeftOver_Array = array_values($LeftOver_Array);
    } 
  }
  else
  {
    $ctr++;
  }
}

$ctr = 0;
while(count($Output_Keys) != 0)
{
  echo $Item_Array[array_shift($Output_Keys)];
}


if($RunType == 1)
{
  $Snippet_Array = $LeftOver_Array;
}
else if($RunType == 2)
{
  $SnippetTag_Array = $LeftOver_Array;
}
else
{
  $SitemapTag_Array = $LeftOver_Array;
}

unset($RunType);
unset($Number);
unset($Page);
unset($Filename);

?>