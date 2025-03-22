<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        extract($_POST) ;
        $errors = [] ;
        
        if(filter_var($quant, FILTER_VALIDATE_INT, ["options" => ["min_range" => 0]]) === false)
            array_push($errors, "quant");

        $_POST["message"] = filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $out = ["form" => $_POST, "errors" => $errors] ;

        if(empty($errors))
            require "./render-output.php" ;
        else
            require "./render-input.php" ;
        
    }else{
        $out = ["form" => $_GET, "errors" => [] ] ;
        require "./render-input.php" ;
    }