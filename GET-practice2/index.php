<?php
    require_once "./db.php" ;
    
    $ids = $_GET["ids"] ?? "" ;
    $favorites = explode("::", $ids) ;
    array_shift($favorites) ;
    
    foreach($people as $k=>$v){
        $people[$k]["selected"] = in_array($k, $favorites) ;
    }

    //var_dump($people) ;
    //var_dump($ids) ;
    //svar_dump($favorites) ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <h2>My Favorites: 
        <span>{</span> 
            <?php foreach($favorites as $f)
                    echo($people[$f]["emoji"]) ;
            ?>
        <span>}</span>
    </h2>
    <a href="?" class="btn ">reset</a>
    <table>

        <tr>
            <th>Emoji</th>
            <th>Id</th>
            <th>Fullname</th>
            <th>Favorites</th>
        </tr>

        <?php foreach($people as $k=>$v): ?>
            <tr class="<?= $v["selected"] ? "selected" : "" ?>">
                <td>
                    <?php if(!$v["selected"]): ?>
                        <a href="?ids=<?= $ids . "::" . $k ?>"><?= $v["emoji"]?></a>
                    <?php else: ?>
                        <span><?= $v["emoji"]?></span>
                    <?php endif ?>
                </td>
                <td><?= $k?></td>
                <td><?= $v["name"]. " " .$v["lastname"] ?></td>
                <td> {
                    <?php foreach($v["fav"] as $f) : ?>
                        <?= $people[$f]["emoji"]?>
                    <?php endforeach; ?>
                    }
                </td>
            </tr>


        <?php endforeach; ?>

    </table>
</body>
</html>