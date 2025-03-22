<?php
    $typeArr = ["Rose", "Daisy", "Tulip"] ;
    $priceArr = [15,10,20] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Flower Bouget</h3>

    <span><?= $out["form"]["quant"]?></span> X <?= $typeArr[$out["form"]["type"]]?>
    <div>
        Price: <?= $out["form"]["quant"] * $priceArr[$out["form"]["type"]] ?> TL.
    </div>
    <div>
        Message: <?= $out["form"]["message"]?>
    </div>
    <a href="">Go Back</a>
</body>
</html>