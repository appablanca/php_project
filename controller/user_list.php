<?php
include('view/header.phtml');
echo ($_SESSION["id"]);
echo ($_SESSION["email"]);

include("view/user_list.phtml");
$hello = $pdo->prepare("SELECT * FROM user");
$hello->execute();
$return = $hello->fetchAll(PDO::FETCH_OBJ);
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>";
echo  "<th>id</th>";
echo "<th>email</th>";
echo "<th>edit</th>";
echo "<th>delete</th>";
echo  "</tr>";
echo "</thead>";
echo "<tbody>";
foreach ($return as $user) {
    if ($user->deleted === 0) {
        echo "<tr>";
        echo "<td>" . $user->id . "</td>";
        echo "<td>" . $user->email . "</td>";

        echo "<form method = 'post' action='user_update'>";
        echo "<input type='hidden' name = 'id' value = ' $user->id' >";
        echo "<input type='hidden' name = 'email' value = ' $user->email' >";
        echo "<td>" . "<button type = 'submit' class='btn btn-primary mb-3'>edit</button>" . "</td>";
        echo "</form>";

        echo "<form method = 'post' action='user_delete'>";
        echo "<input type='hidden' name = 'id' value = ' $user->id' >";
        echo "<td>" . "<button type = 'submit' class='btn btn-primary mb-3'>delete</button>" . "</td>";
        echo "</form>";

        echo "</tr>";
    }
}
echo "</tbody>";
echo "</table>";


include('view/footer.phtml');
