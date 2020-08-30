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
.del
{
	position: absolute;
	width: 3%;
	margin-top: -8%;
	margin-left: 60%;
}
.edit
{
	position: absolute;
	width: 4.3%;
	margin-top: -8%;
	margin-left: 53.5%;
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
</style>
<head>
	<title>Comments</title>
	<link rel="icon" type="image/png" href="/img/icon.png">
	<script src="/js/jquery-3.4.1.min.js"></script>
</head>

<div class="d-block-flex p-3 dash">
<ul>
	<?php

	session_start();
	if (!isset($_SESSION['auth'])) {
		header('Location: /admin');
		die();
	}
	require_once '../db.php';

	try {
		if (isset($_GET['del'])) {
			$model = $_GET['del'];
			$sql = "DELETE FROM comment WHERE id = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $model);
			$stmt->execute();
		}
		$sql = "SELECT id, name, email, comment, date FROM comment ORDER BY id DESC";
		$res = $conn->query($sql);
		while ($row = $res->fetch()) {
	?>
	<li id="<?php echo $row['id'] ?>" class="list-group-item li">
	<a href="edit.php?id=<?php echo $row['id'] ?>" class="model-link"><?php echo $row['name']; ?></a>
	<div class="dropdown-form">
		<p class="form-control"><?php echo date('Y-m-d H:i:s', $row['date']); ?></p>
	</div>
	<a onClick="return confirm('Are you sure?');" href="?del=<?php echo $row['id'] ?>"><img class="del float-right" src="del.png"></a>
	</li>
	<?php
		}$conn=null;
 	} catch(PDOException $e){echo $e->getMessage();}
	?>
</ul>
<a href="/admin/cms.php" >&larr; Back</a>
</div>