<?php
session_start();
session_destroy();
header('location: ../site/first-page-re.html');
?>