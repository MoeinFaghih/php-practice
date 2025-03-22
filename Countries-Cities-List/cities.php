<?php
    require "./world_db.php" ;
    extract($_GET) ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>City Name</th>
            <th>Population</th>
        </tr>
        <?php foreach($cities as $k => $v ): ?> 
            <?php if($v["code"] == $code): ?>
                <tr>
                    <td><?= $v["name"] ?></td>
                    <td><?= $v["population"] ?></td>
                </tr>
            <?php endif ?>
        <?php endforeach; ?>
    </table>

    <a href="./index.php?page=<?= $page ?>&sort=<?= $sort ?>">Go back to main</a>
</body>
</html>