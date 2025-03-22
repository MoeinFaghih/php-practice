<?php
    require_once "./db.php" ;
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $errors=[];
        if(filter_var($_POST["reportNo"], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1000]]) === false)
            $errors["reportNo"]= "reportNo" ;
        
        $_POST["message"] =filter_var($_POST["message"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
        
        $out = ["form" => $_POST, "errors" => $errors] ;

        if(empty($errors))
            require "./render-output.php";
        else
            require "./render-input.php" ;
    }else{      //GET
        //var_dump("entered!") ;
        $out = ["form" => $_GET] ;
        require "./render-input.php" ;
    } 