<?php
session_start();

require_once __DIR__ . '/functions.php';

// qui salvo le informazioni delle checkbox
$uNumbers = isset($_GET['numbers']);
$uLetters = isset($_GET['letters']);
$uSpecialCharacters = isset($_GET['special']);
$repeatCharacters = isset($_GET['repeat']);

$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$numbers = '0123456789';
$symbols = '!@#,.;:?(){}[]+-';

$allCharacters = useCharacters($uNumbers, $uLetters, $uSpecialCharacters, $letters, $numbers, $symbols);

$newNumber = false;

if (isset($_GET['passwordLenght'])) {
    $passwordCharacters = (int)$_GET['passwordLenght'];
    if ($passwordCharacters >= 6) {
        $_SESSION['password'] = generateRandomPassword($passwordCharacters, $allCharacters, $repeatCharacters);
        header('Location: ./response.php');
    } else {
        $newNumber = true;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <form method="GET" action="index.php">
            <div class="mb-3">
                <label for="password">Quanti caratteri deve contenere la password?</label>
                <input type="number" class="form-control" id="password" name="passwordLenght">

                <?php if ($newNumber) { ?>
                    <div class="alert alert-danger" role="alert">Caratteri minimi 6</div>
                <?php } ?>

                <div class="form-check">
                    <h3>Ripetere caratteri?</h3>
                    <input class="form-check-input" type="radio" name="repeat" id="repeat1" value="0" checked>
                    <label class="form-check-label" for="repeat1">
                        No
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="repeat" id="repeat2" value="1">
                    <label class="form-check-label" for="repeat2">
                        Si
                    </label>
                </div>
                <h3>Scegliere quali caratteri utilizzare utilizzare</h3>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="numbers" value="1" name='numbers' checked>
                    <label class="form-check-label" for="numbers">Numeri</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="letters" value="1" name="letters" checked>
                    <label class="form-check-label" for="letters">Lettere</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="special" value="1" name="special" checked>
                    <label class="form-check-label" for="special">Caratteri speciali</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>

</html>