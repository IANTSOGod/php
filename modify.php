<?php
session_start();

//si obtiens de lui-meme les valeurs a subsituer les mets dans le tableau et le renvoie directement à afficher dans traitement.php
if (isset($_GET['pos'])) {
    $pos = $_GET['pos'];

    if (isset($_SESSION['table'])) {
        $table = $_SESSION['table'];

        if (isset($_POST['submit'])) {
            $a = $_POST['f_nbr'];
            $b = $_POST['s_nbr'];

            $c = $a * $b;
            $table[$pos] = array($a, "x", $b, "=", $c);

            $_SESSION['table'] = $table;

            header("Location: traitement.php");
            exit();
        } else {
//un formulaire pour avoir les valeurs a susbtituer
?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Modify</title>
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
                <div class="container">
                    <div class="form-container">
                        <form method="post">
                            <div class="input-group">
                                <label for="nbr_a">Modifier le premier nombre</label>
                                <input type="text" name="f_nbr" id="nbr_a" value="<?php echo $table[$pos][0]; ?>">
                            </div>
                            <div class="input-group">
                                <label for="nbr_b">Modifier le second nombre</label>
                                <input type="text" name="s_nbr" id="nbr_b" value="<?php echo $table[$pos][2]; ?>">
                            </div>
                            <div class="input-group">
                                <input type="submit" name="submit" value="Modify this line">
                            </div>
                        </form>
                    </div>
                </div>
            </body>
            </html>

<?php
        }
    }
}
?>
