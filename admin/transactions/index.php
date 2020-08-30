<?php

session_start();
if (!isset($_SESSION['auth'])) {
	header('Location: /admin');
	die();
}
require_once '../db.php';
try {
	if (isset($_GET['del'])) {
		$sql = "DELETE FROM transaction WHERE (refid is null or refid = '')";
		$conn->exec($sql);
		echo "<script>window.location.href = '/admin/transactions';</script>";
	}
	$sql = "SELECT id, name, refid, date FROM transaction ORDER BY id DESC";
	$res = $conn->query($sql);
?>
<link rel="stylesheet" type="text/css" href="/admin/bootstrap.css">
<style>
* {padding: 0; margin: 0;}
body { background-color: #ccc }
.dash{
  background-color: white;
  width: 600px;
  margin: auto;
  margin-top: 5%;
  border-radius: 0.5vw;
  box-shadow: 0 0 1vw 0 rgba(0, 0, 0, 0.2), 0 0.25vw 0.25vw 0 rgba(0, 0, 0, 0.24);
}
.li {
	border:#bbb solid 2px;
	height:65px;
}
ul {
	max-height: 700px;
	overflow: auto;
}
ul::-webkit-scrollbar {
    display: none;
}
.model-link
{
	position: absolute;
	margin-top: 1.3%;
	color: black;
}
li:nth-child(even) {background-color: #f2f2f2;}
.dropdown-form {
	width: 32.7%;
	margin-left: 70%;
}
select {
	direction: rtl;
}
.input {
	position: absolute;
	width: 250px;
}
</style>
<head>
	<title>Transactions</title>
	<link rel="icon" type="image/png" href="/img/icon.png">
	<script src="/js/jquery.js"></script>
	<script>
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("li").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});
	</script>
</head>

<div class="d-block-flex p-3 dash">
<input type="text" id="myInput" placeholder="Transaction Number" class="form-control input">
<a href="?del" onClick="return confirm('Are you sure?');" class="btn btn-danger" style="margin-bottom: 1%; margin-left: 81.9%;">حذف ناموق</a>
<ul>
	<?php
	while ($row = $res->fetch()) {
	?>
	<li id="<?php echo $row['id'] ?>" class="list-group-item li">
	<a href="edit.php?id=<?php echo $row['id'] ?>" class="model-link"><?php echo $row['name']; ?></a>
	<div class="dropdown-form">
		<p class="form-control"><?php echo date('Y-m-d H:i:s', $row['date']); ?></p>
	</div>
	<span style="display: none;"><?php echo $row['refid'] ?></span>
	</li>
	<?php } ?>
</ul>
<a href="/admin/cms.php" >&larr; Back</a>
</div>
<?php
$conn=null;
} catch(PDOException $e){echo $e->getMessage();}
?>