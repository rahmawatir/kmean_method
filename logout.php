<?php

session_start();

if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
}
if(isset($_SESSION['level']))
{
	unset($_SESSION['level']);
}

session_destroy();
header('location: index.php', true, 301);

?>