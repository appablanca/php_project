<?php
include('view/header.phtml');
echo ($_SESSION["id"]);
echo ($_SESSION["email"]);

include("view/patient_list.phtml");
$hello = $pdo->prepare("SELECT * FROM patient");
$hello->execute();
$return = $hello->fetchAll(PDO::FETCH_OBJ);
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th>patient_no</th>";
echo "<th>name</th>";
echo "<th>tc</th>";
echo "<th>gender</th>";
echo "<th>birth date</th>";
echo "<th>height</th>";
echo "<th>weight</th>";
echo "<th>BMI</th>";
echo "<th>complaint</th>";
echo "<th>ilness</th>";
echo "<th>smoker</th>";
echo "<th>amount of cigs</th>";
echo "<th>phone no</th>";
echo "<th>adress</th>";
echo "<th>edit</th>";
echo "<th>delete</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($return as $patient) {
    if ($patient->deleted === 0) {
        echo 10;
        echo "<tr>";
        echo "<td>" . $patient->patient_no . "</td>";
        echo "<td>" . $patient->patient_name . "</td>";
        echo "<td>" . $patient->tc_no . "</td>";
        echo "<td>" . $patient->gender . "</td>";
        echo "<td>" . $patient->birth_date . "</td>";
        echo "<td>" . $patient->height . "</td>";
        echo "<td>" . $patient->weight . "</td>";
        echo "<td>" . $patient->BMI . "</td>";
        echo "<td>" . $patient->complaint . "</td>";
        echo "<td>" . $patient->ilness . "</td>";
        echo "<td>" . $patient->smoker . "</td>";
        echo "<td>" . $patient->amountOfCigs . "</td>";
        echo "<td>" . $patient->phone_no . "</td>";
        echo "<td>" . $patient->adress . "</td>";
        echo "<td>" . $patient->adress . "</td>";
        echo "<td>" . $patient->adress . "</td>";

      

        echo "</tr>";
    }
}
echo "</tbody>";
echo "</table>";


include('view/footer.phtml');
