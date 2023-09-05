<?php
include ('view/header.phtml');
echo($_SESSION["id"]);
echo($_SESSION["email"]);
echo("<br>");
if(isset($_POST['action']) && $_POST['action']=='add_user') {
    $addEmail = $_POST["email"];
    $addPassword = md5($_POST["password"]);
    $addConfirm = $_POST["confirm_password"];
    $hello = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $hello->bindParam(':email', $addEmail);
    $hello->execute();
    $return = $hello->fetch(PDO::FETCH_ASSOC);
    if (isset($return["id"])) {
        echo("user with email already exists");
    } else {
        $addUser = $pdo->prepare("INSERT INTO user (email,password) VAlUES (:aEmail,:aPassword)");
        $addUser->bindParam(":aEmail",$addEmail);
        $addUser->bindParam(":aPassword",$addPassword);
        $addUser->execute();
        header("Location: user_list"); 
    }
}

$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day






include ('view/user_add.phtml');

include ('view/footer.phtml');
?>