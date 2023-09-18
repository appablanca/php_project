<?php
$deleteId = $_POST["id"];
$query = $pdo->prepare("UPDATE patient SET deleted=1 WHERE patient_no = :id");
$query->bindParam(':id',$deleteId);
$query->execute();
$return = $query->fetch(PDO::FETCH_ASSOC);
header("Location: patient_list");

