<?php

require_once '../admin/db.php';

$name = sanitize($_POST['name']);
$email = sanitize($_POST['email']);
$comment = sanitize($_POST['comment-text']);
$captcha = $_POST['g-recaptcha-response'];
$date = time();
$secretKey = "6Lc3OfYUAAAAAE3FgL89zgIBAp2i-jIcLAuxUJNe";
$ip = $_SERVER['REMOTE_ADDR'];
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response,true);

function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "SELECT email FROM comment WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $email);
$stmt->execute();
$res = $stmt->fetch();

if($responseKeys["success"]) {
	if ($stmt->rowCount() == 2) {
		header('HTTP/1.0 302 Found');
	} else {
		// $sql = "INSERT INTO tmp_comment (name, email, comment, `date`) VALUES (?, ?, ?, ?)";
		// $stmt = $conn->prepare($sql);
		// $stmt->bindParam(1, $name);
		// $stmt->bindParam(2, $email);
		// $stmt->bindParam(3, $comment);
		// $stmt->bindParam(4, $date);
		// $res = $stmt->execute();
		$res = true;
		if ($res == true) {
			header('HTTP/1.0 200 OK');
		}
	}
} else {
	header('Location: https://google.com');
	die();
}

?>