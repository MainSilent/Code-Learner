<?php

session_start();
if (isset($_SESSION['auth'])) {
	header('Location: /admin/cms.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$captcha = $_POST['g-recaptcha-response'];
	$secretKey = "6Lc3OfYUAAAAAE3FgL89zgIBAp2i-jIcLAuxUJNe";
	$ip = $_SERVER['REMOTE_ADDR'];
	$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
	$response = file_get_contents($url);
	$responseKeys = json_decode($response,true);
	$user = $_POST['user'];
	$pass= $_POST['pass'];

	if($responseKeys["success"]) {
		try {
			include 'db.php';
			$sql = "SELECT username, password FROM admin WHERE username = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $user);
			$stmt->execute();
			$res = $stmt->fetch();

			if ($stmt->rowCount() == 1 && password_verify($pass, $res['password'])) {
				$_SESSION['auth'] = true;
				header('Location: cms.php');
			} else {
				echo "<script>alert('Incorrect Username And Paasword');";
				echo "window.location.href = '/admin/';</script>";
			}

			$conn = null;
		}catch(PDOException $e) {echo $e->getMessage();}
	} else {
		header('Location: https://google.com');
		die();
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>CMS Login</title>
	<link rel="icon" type="image/png" href="/img/icon.png">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="media.css">
	<script src='https://www.google.com/recaptcha/api.js?hl=fa'></script>
</head>
<body>

<div class="login-page">
  <div class="form">
    <form id="login" class="login-form" method="post">
      <input name="user" type="text" placeholder="Username" class="form-control" maxlength="32" required>
      <input name="pass" type="password" placeholder="Password" class="form-control" maxlenght="32" required><br>
      <div id="captcha" class="g-recaptcha center" data-sitekey="6Lc3OfYUAAAAACgrMyW15fZKv8uK0z4UuIIL7DH6"></div><br>
      <button form="login" class="btn btn-success px-md-5 p-2">Login</button>
    </form>
  </div>
</div>

</body>
</html>