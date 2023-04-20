<?php
    function useCharacters($uNumbers, $uLetters, $uSpecialCharacters, $letters, $numbers, $symbols){
        $selectedCharacters = [];
        if($uNumbers == 1){
            $selectedCharacters = array_merge(str_split($numbers));
        }else if($uLetters == 1){
            $selectedCharacters = array_merge(str_split($letters));
        }else if($uSpecialCharacters == 1){
            $selectedCharacters = array_merge(str_split($symbols));
        }
        return implode($selectedCharacters);
    }


    // funzione che ci genererà la password casuale dall'array di caratteri scelti
    function generateRandomPassword($length, $characters, $repeat = 0){
        $password = '';
        $charactersLength = strlen($characters);
        if ($repeat == 1) {
            for($i = 0; $i < $length; $i++){
                $password .= $characters[rand(0, $charactersLength - 1)];
            }
        } else {
            while (strlen($password) < $length) {
                $index = rand(0, $charactersLength - 1);
                $character = $characters[$index];
                if (!str_contains($password, $character)) {
                    $password .= $character;
                }
            }
        }
        return $password;
    }
    
?>