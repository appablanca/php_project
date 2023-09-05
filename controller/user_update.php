<?php
include('view/header.phtml');
echo ($_SESSION["id"]);
echo ($_SESSION["email"]);
$updateId = $_POST["id"];
$updateEmail = $_POST["email"];
$query = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$query->bindParam(':id', $updateId);
$query->execute();
$return = $query->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['action']) && $_POST['action'] == 'user_update') {
    if (isset($_POST["email"])) {
        $newEmail = $_POST["email"];
        $query2 = $pdo->prepare("UPDATE user SET email = :email WHERE id = :id");
        $query2->bindParam(":email", $newEmail);
        $query2->bindParam(':id', $updateId);
        $query2->execute();
        }
    if (isset($_POST["password"])) {
        $newPassword = md5($_POST["password"]);
        $query3 = $pdo->prepare("UPDATE user SET password = :npassword WHERE id = :id");
        $query3->bindParam(':id', $updateId);
        $query3->bindParam(":npassword", $newPassword);
        $query3->execute();
    }
}
include("view/user_update.phtml");
include('view/footer.phtml');
