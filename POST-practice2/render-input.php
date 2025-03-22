<?php
    if (!isset($out["form"]["type"])) 
        $checked = 0;
    else
        $checked = $out["form"]["type"] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
    <h3>Flower Shop</h3>
    <form method="POST">
    <div class="container">
        <div>
            <img src="./rose.jpg" >
            <input type="radio" name="type" id="rose" value="0" <?= $checked == 0 ? "checked" : "" ?> >
        </div>
        <div>
            <img src="./daisy.jpg">
            <input type="radio" name="type" id="daisy" value="1" <?= $checked == 1 ? "checked" : "" ?>>
        </div>
        <div>
            <img src="./tulip.jpg">
            <input type="radio" name="type" id="tulip" value="2" <?= $checked == 2 ? "checked" : "" ?>>
        </div>
    </div>

    <div class="container">
        Quantity = <input type="text" name="quant" value= <?= isset($out["form"]["quant"]) ? $out["form"]["quant"] : ""?>>
        <div style="color: red;"><?= in_array("quant", $out["errors"]) ? "Enter a valid quantity!" : "" ?> </div>
    </div>

    <div class="container">
        Message: <textarea name="message"><?= isset($out["form"]["message"]) ? $out["form"]["message"] : "" ?></textarea>
    </div>

    <input type="submit" value="Buy">
    </form>
    
</body>
</html>