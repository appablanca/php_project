<?php
include('view/header.phtml');
echo ($_SESSION["id"]);
echo ($_SESSION["email"]);
echo ("<br>");
if (isset($_POST['action']) && $_POST['action'] == 'log_patient') {

    $patientName = $_POST["patient_name"];
    $patientTc = $_POST["tc_no"];
    $patientGender = $_POST["gender"];
    $patientDate = $_POST["birth_date"];
    $patientWeight = $_POST["weight"];
    $patientHeight = $_POST["height"];
    $patientBMI = $_POST["BMI"];
    $patientComplaint = $_POST["complaint"];
    $patientIlness = $_POST["ilness"];
    $patientSmoker = $_POST["smoker"];
    $patientHowMany = $_POST["amountOfCigs"];
    $patientPhoneNo = $_POST["phone_no"];
    $patientAdress = $_POST["adress"];

    $querry = $pdo->prepare("SELECT * FROM patient WHERE tc_no = :tc_no");
    $querry->bindParam(':tc_no', $patientTc);
    $querry->execute();
    $return = $querry->fetch(PDO::FETCH_ASSOC);

    $addPatient = $pdo->prepare(
        "INSERT INTO patient (patient_name,tc_no,gender,birth_date,height,weight,BMI,complaint,ilness,smoker,amountOfCigs,phone_no,adress) VAlUES (:patient_name,:tc_no,:gender,:birth_date,:height,:weight,:BMI,:complaint,:ilness,:smoker,:amountOfCigs,:phone_no,:adress)");
    $addPatient->bindParam(":patient_name", $patientName);
    $addPatient->bindParam(":tc_no", $patientTc);
    $addPatient->bindParam(":gender",$patientGender);
    $addPatient->bindParam(":birth_date",$patientDate);
    $addPatient->bindParam(":height",$patientHeight);
    $addPatient->bindParam(":weight",$patientWeight);
    $addPatient->bindParam(":BMI",$patientBMI);
    $addPatient->bindParam(":complaint",$patientComplaint);
    $addPatient->bindParam(":ilness",$patientIlness);
    $addPatient->bindParam(":smoker",$patientSmoker);
    $addPatient->bindParam(":amountOfCigs",$patientHowMany);
    $addPatient->bindParam(":phone_no",$patientPhoneNo);
    $addPatient->bindParam(":adress",$patientAdress);
    $addPatient->execute();
    header("Location: user_list");
}







include('view/log_patient.phtml');

include('view/footer.phtml');
