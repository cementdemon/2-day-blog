<?php
// find the session
session_start();

// end session message
echo "Logged out".
    header("Location: index.php");

//delete session
session_destroy();
?>