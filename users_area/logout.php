<?php
session_start();
session_unset();
session_start();
echo"<script>window.open('../index.php','_self')</script>";

?>