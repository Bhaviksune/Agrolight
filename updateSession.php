<?php
// updateSession.php

//  resume the PHP session
session_start();

//  current value from  AJAX request
$currentValue = isset($_GET['currentValue']) ? $_GET['currentValue'] : '';

// Store the value in  session
$_SESSION['inputValue'] = $currentValue;

// Respond with  updated value
echo "Value updated in session: " . $_SESSION['inputValue'];
?>
