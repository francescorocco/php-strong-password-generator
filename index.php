<?php
    session_start();

    require_once __DIR__ .'/functions.php';


    $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $symbols = '!@#,.;:?(){}[]+-';

    $allCharacters = array_merge(str_split($letters), str_split($numbers), str_split($symbols));

    $newNumber = false;

    if(isset($_GET['password'])){
        $passwordCharacters = (int)$_GET['password'];
        if($passwordCharacters > 6){
            $_SESSION['password'] = generateRandomPassword($passwordCharacters, $allCharacters);
            header('Location: ./response.php');
        }else{
            $newNumber =true;
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
                <input type="number" class="form-control" id="password" name="password">

                <?php if($newNumber){ ?>
                    <div class="alert alert-danger" role="alert">Caratteri minimi 6</div>
                <?php }?>
                
                

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>

</html>