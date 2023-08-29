<?php

require 'modal/config.php';

if(isset($_GET['page']) ){
    $controller  = $_GET['page'];
}else{
    $controller  = "user_list";
}

$controller_filepath = "controller/" . $controller . ".php";

if (is_file($controller_filepath) && file_exists($controller_filepath)) {
    include $controller_filepath;
} else {
    echo "Sayfa bulunamadı!";
    exit;
}
?>