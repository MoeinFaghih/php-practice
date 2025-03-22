<?php
    $singerArr=["Teoman", "Mor Ve Otesi", "Feridun Duzagac"] ;
    $singerPrice = [75, 35, 50] ;


    $totalPrice = $singerPrice[$out["form"]["singer"]] * $out["form"]["number"];
    if(isset($out["form"]["vip"]))
        $totalPrice *= 2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="item">
        Singer/Group: <?= $singerArr[$out["form"]["singer"]] ?> 
    </div>

    <div class="item">
        VIP: <?= isset($out["form"]["vip"]) ? "YES" : "NO" ?>
    </div>

    <div class="item">
        # of Person: <?= $out["form"]["number"] ?>
    </div>

    <div class="total">
        Total Price: <?= $totalPrice ?>
    </div>

    <a href="?">BACK</a>
</body>
</html>