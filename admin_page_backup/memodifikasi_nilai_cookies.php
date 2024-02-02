<?php
$cookie_name = "user";
$cookie_value = "Joko Anwar";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

if(!isset($_COOKIE[$cookie_name])){
    echo "Cookie bernama ' ". $cookie_name. "'belum diatur";
} else{
    echo "Cookie '" . $cookie_name . "' sudah diatur!<br>";
    echo "Nilai Cookie adalah :" . $_COOKIE[$cookie_name];
}
?>