<?php
$deleteId = $_POST["id"];
$query = $pdo->prepare("UPDATE user SET deleted=1 WHERE id = :id");
$query->bindParam(':id',$deleteId);
$query->execute();
$return = $query->fetch(PDO::FETCH_ASSOC);
header("Location: user_list");

