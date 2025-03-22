<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        extract($_POST) ;
        var_dump($_POST) ;
        $errors = [] ;
        $out = [] ;

        if(filter_var($number, FILTER_VALIDATE_INT) == false)
            $errors["number"] = "Not an integer value!" ;
        else if($number>6 || $number<1){
            $errors["number"] = "Invalid Range [1-6]! ";
        }

        $out = [ "form" => $_POST, "errors" => $errors ] ;
        if(empty($errors)){
            require "./render-output.php" ;
        }else{
            require "./render-input.php" ;
        }

    }else{
        require "./render-input.php";
    }
?>