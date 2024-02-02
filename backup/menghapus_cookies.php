<?php
// Set the expiration date to one hour ago
setcookie("user", "", time() - 3600);

// Output message
echo "Cookie 'user' telah dihapus.";
?>
