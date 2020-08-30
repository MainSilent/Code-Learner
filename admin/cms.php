<?php

session_start();

if (!isset($_SESSION['auth'])) {
	header('Location: /admin');
	die();
}

# Logout-----------------------------------
if (isset($_GET['logout'])) {
	session_destroy();
	header('Location: /admin');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome Admin</title>
	<link rel="icon" type="image/png" href="/images/Logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="cms.css">
</head>
<body>
	<div class="d-block-flex p-3 dash">
		<a href="transactions/index.php" style="color: white; text-decoration: none;"><p class="p-2 product sel">تراکنش ها</p></a>
		<a href="comments/index.php" style="color: white; text-decoration: none;"><p class="p-2 details-list sel">نظرات</p></a>
		<a href="tmp_comments/index.php" style="color: white; text-decoration: none;"><p class="p-2 pl-list sel">نظرات تایید نشده</p></a>
		<a href="?logout" style="color: white; text-decoration: none;"><p class="p-2 logout sel">خروج</p></a>
	</div>
</body>
</html>