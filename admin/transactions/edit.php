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
  margin-top: 4%;
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
	<title>Edit Product</title>
	<script src="/js/jquery-3.4.1.min.js"></script>
	<link rel="icon" type="image/png" href="/images/Logo.png">
</head>

<div class="d-block-flex p-3 dash">
	<?php 
	$id = $_GET['id'];
	$sql = "SELECT name, mobile, email, amount, authority, refid, date FROM transaction WHERE id = $id";
	$res = $conn->query($sql)->fetch();
	?>
	<h4 style="text-align: right;"><?php echo $res['name']; ?></h1><hr>
	<h6>RefId: <?php echo $res['refid']; ?></h6><hr>
	<h6>Authority: <?php echo $res['authority']; ?></h6><hr>
	<h6>Mobile: <?php echo $res['mobile']; ?></h6><hr>
	<h6>Email: <?php echo $res['email']; ?></h6><hr>
	<p class="form-control float-right" style="text-align: right; width: 36.6%;"><?php echo date('Y-m-d H:i:s', $res['date']); ?></p>
	<p><?php echo $res['amount'] ?> Toman</p><br>
	<a href="/admin/transactions/" >&larr; Back</a>
</div>
<?php
$conn=null;
} catch(PDOException $e){echo $e->getMessage();}
?>