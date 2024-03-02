<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="traitement.php" method="get">
                <div class="input-group">
                    <label for="nbr_a">a:</label>
                    <input type="text" class="input_1" name="a" id="nbr_a" placeholder="Insérer le premier nombre ici">
                </div>
                <div class="input-group">
                    <label for="nbr_b">b:</label>
                    <input type="text" class="input_1" name="b" id="nbr_b" placeholder="Insérer le deuxième nombre ici">
                </div>
                <div class="input-group">
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
