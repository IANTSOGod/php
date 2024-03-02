<?php
session_start();

//creation du tableau ou recuperation des modifications
if (isset($_GET['a']) && isset($_GET['b'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];

    $table = array();
    for ($i = 0; $i <= $b; $i++) {
        $c = $a * $i;
        $table[] = array($a, "x", $i, "=", $c);
    }

    $_SESSION['table'] = $table;
} else {
    if (isset($_SESSION['table'])) {
        $table = $_SESSION['table'];
        $a = $table[0][0];
        $b = end($table)[2];
    } else {
        $a = 5;
        $b = 10;
        $table = array();
        for ($i = 0; $i <= $b; $i++) {
            $c = $a * $i;
            $table[] = array($a, "x", $i, "=", $c);
        }
        $_SESSION['table'] = $table;
    }
}

//retire une ligne si a un url delete avec la position
if (isset($_GET['delete']) && isset($_SESSION['table'])) {
    $pos = $_GET['delete'];
    if (isset($table[$pos])) {
        unset($table[$pos]);
        $_SESSION['table'] = $table;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
                <table>


<?php
            //affiche le contenu du tableau
            if (isset($_SESSION['table'])) {
                $table = $_SESSION['table'];
                foreach ($table as $cle => $valeur) {
                    $background_color = ($cle % 2 == 0) ? '#f0f9eb' : '#fce4e4'; 
                    echo "<tr style='background-color: $background_color;'>";
                    foreach ($valeur as $colonne) {
                        echo "<td>" . $colonne . "</td>";
                    }
                    echo "<td class='link-group'><a href='modify.php?pos=$cle'>Modify</a> | <a href='traitement.php?delete=$cle'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }
?>

                </table>
    </div>
</body>
</html>
