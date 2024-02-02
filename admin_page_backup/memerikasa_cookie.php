<?php
// Define the cookie name
$cookie_name = "user";

// Set the cookie value
$cookie_value = "Karina";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

// Check if cookies exist
if (count($_COOKIE) > 0) {
    echo "Cookies ada.";
} else {
    echo "Cookies tidak ada.";
}
?>
