<?php
    require "./world_db.php" ;

    $page = $_GET["page"] ?? 1 ;
    $sort = $_GET["sort"] ?? "country" ;

    $startInd = ($page-1) * 10 ;
    $endInd = $page*10 > count($countries) ? count($countries) : $page*10 ;

    usort($countries, function($a,$b) use ($sort, $cities, $countries){
        $aCountry = $cities[$a["capital"]]["name"] ?? "" ;
        $bCountry = $cities[$b["capital"]]["name"] ?? "" ;
        switch($sort){
            case "country": return $a["name"] <=> $b["name"] ;
            case "area": return $a["area"] <=> $b["area"] ;
            case "population": return $a["population"] <=> $b["population"] ;
            case "capital": return $aCountry <=> $bCountry ;
        }
    }) ;

    var_dump($sort);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th><a href="?sort=country">Country</a></th>
            <th><a href="?sort=area">Area</a></th>
            <th><a href="?sort=population">Population</a></th>
            <th><a href="?sort=capital">Capital</a></th>
        </tr>
        <?php for($i= $startInd; $i<$endInd ; $i++): ?>
            <tr style="<?= $i%2 == 0 ? "background-color: #ddd;" : "" ?>">
                <td><?= $i+1 ?></td>
                <td><a href="./cities.php?code=<?= $countries[$i]["code"]?>&page=<?= $page ?>&sort=<?= $sort ?>"><?= $countries[$i]["name"]?></a></td>
                <td><?= $countries[$i]["area"]?></td>
                <td><?= $countries[$i]["population"]?></td>
                <td><?= $cities[$countries[$i]["capital"]]["name"] ?? "" ?></td>
            </tr>
        <?php endfor; ?>
    </table>
    
    <?php for($i=1 ; $i<=ceil(count($countries)/10) ; $i++): ?>
        <?php if($i==$page): ?>
            <span style="background-color: #933"><?= $i ?></span>
        <?php else: ?>
            <a href="?page=<?= $i ?>&sort=<?= $sort ?>"><?= $i ?></a>
        <?php endif ?>
    <?php endfor; ?>
</body>
</html>