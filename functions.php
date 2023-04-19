<?php
    // funzione che ci genererà la password casuale dall'array di caratteri scelti
    function generateRandomPassword($length, $characters){
        $password = '';
        $charactersLenght = count($characters);
        for($i = 0; $i < $length; $i++){
            $password.= $characters[rand(0, $charactersLenght -1)];
        }
        return $password;
    }
?>