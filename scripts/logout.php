<?php

session_start(); // start session

session_destroy(); // destroy session
echo "<script type = \"text/javascript\">
          window.location = (\"../index.php\");
      </script>";
  
?>

