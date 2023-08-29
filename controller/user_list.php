<?php
include ('view/header.phtml');


include("view/user_list.phtml");   
$hello = $pdo->prepare("SELECT * FROM user");
$hello->execute();
$return = $hello->fetchAll(PDO::FETCH_ASSOC);
foreach($return as $users){
    foreach($users as $user){
        echo $user."<br>";
    }
}


include ('view/footer.phtml');
