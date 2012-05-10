<?php
$pathinfo = pathinfo($_SERVER['PHP_SELF']);
$extension = $pathinfo['extension'];
if($extension == "js"){
  header("Content-type: text/javascript");
  header("Cache-control: must-revalidate");
  $offset = 60 * 60 * 24 * 7;
  $expire = "Expires: " . gmdate ("D, d M Y H:i:s", time() + $offset) . " GMT";
  header ($expire);
}
?>
