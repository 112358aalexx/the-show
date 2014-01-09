<html>
<head>
  <title>The Show</title>
  <link rel="stylesheet" href="themes/default.css" type="text/css" media="screen" />
</head>
<body>

<?php 
  require 'conf/settings.php';
  Print "<div style='position:fixed;top:0;background-color:white;width:100%;z-index:2;'>";
  require('inc/nav.php');
?>

  </div>
  <div class='content'>

<?php
  if ($page == "cdr")
  {
    require('modules/cdr.php');
  }
  elseif ($page == "usage")
  {
    require('modules/trunk_usage.php');
  }
?>

  </div>
</body>
</html>
