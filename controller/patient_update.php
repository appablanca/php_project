<?php
include('view/header.phtml');
echo ($_SESSION["id"]);
echo ($_SESSION["email"]);
$updateNo = $_POST["patient_no"];
$aQuerry = $pdo->prepare("SELECT * FROM patient WHERE patient_no = :patient_no");
$aQuerry->bindParam(":patient_no",$updateNo);
$aQuerry->execute();
$return = $aQuerry->fetch(PDO::FETCH_ASSOC);
$a = 0;
foreach($return as $pat){
    echo $a."<br>";
    echo $pat;
    $a= $a +1;
}
include("view/patient_update.phtml");
include("view/footer.phtml");