<?php
    include '../DBConnection.php';
    $conn = OpenCon();
 session_start();

  echo "Logout Successfully ";
  session_destroy();
  header("Location: login-page.php");
?>