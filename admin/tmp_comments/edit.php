<?php

session_start();
if (!isset($_SESSION['auth'])) {
	header('Location: /admin');
	die();
}

include '../db.php';

try {

?>
<link rel="stylesheet" type="text/css" href="/admin/bootstrap.css">
<style>

* {padding: 0; margin: 0;}
body { background-color: #ccc }
.dash{
  background-color: white;
  width: 500px;
  margin: auto;
  margin-top: 15%;
  border-radius: 0.5vw;
  box-shadow: 0 0 1vw 0 rgba(0, 0, 0, 0.2), 0 0.25vw 0.25vw 0 rgba(0, 0, 0, 0.24);
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<head>
	<title>Submit Comment</title>
	<script src="/js/jquery-3.4.1.min.js"></script>
	<link rel="icon" type="image/png" href="/images/Logo.png">
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id=$_POST['id'];$name=$_POST['name'];
	$email=$_POST['email'];$comment=$_POST['comment'];
	$feedback=$_POST['feedback'];$date=$_POST['date'];
	$sql = "INSERT INTO comment (name, email, comment, feedback, date)
	VALUES ('$name', '$email', '$comment', '$feedback', '$date');
	DELETE FROM tmp_comment WHERE id = $id";
	$conn->exec($sql);
	header('Location: /admin/tmp_comments/');
}
?>

<div class="d-block-flex p-3 dash">
	<form method="post">
		<?php 
		$id = $_GET['id'];
		$sql = "SELECT id, name, email, comment, date  FROM tmp_comment WHERE id = $id";
		$res = $conn->query($sql)->fetch();
		?>
		<p class="float-right" style="text-align: right;" dir="rtl"><?php echo $res['comment']; ?></p><br>
		<p><?php echo $res['email']; ?></p>
		<textarea rows="6" class="form-control" dir="rtl" name="feedback"></textarea>
		<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
		<input type="hidden" name="name" value="<?php echo $res['name']; ?>">
		<input type="hidden" name="email" value="<?php echo $res['email']; ?>">
		<input type="hidden" name="comment" value="<?php echo $res['comment']; ?>">
		<input type="hidden" name="date" value="<?php echo $res['date']; ?>">
		<?php
		$conn=null;
		} catch(PDOException $e){echo $e->getMessage();}
		?>
		<input type="submit" value="Submit" style="margin-top: 2.5%;" class="btn btn-success">
	</form><br>
	<a href="/admin/tmp_comments/" >&larr; Back</a>
</div>
