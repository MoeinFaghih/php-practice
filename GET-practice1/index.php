<?php

    require "./data.php" ;
    $today = new DateTime();

   if(!empty($_GET)){

    $gender = $_GET["gender"];
    
    //var_dump($users);

    $out = [] ;

    foreach ($users as $k => $v) {
        
        $totalSpent = 0;
        $totalCount = 0;
        $userObj = [] ;

        //var_dump($v["fullname"]); 
        if($v["gender"] == $gender){
            $birthDateObj = DateTime::createFromFormat("d/m/Y", $v["birthday"]);

            $userObj["name"] = $v["fullname"];
            $userObj["age"] = $today->diff($birthDateObj)->y;
            $userObj["phone"] = $v["phone"];

            foreach($orders as $order){
                if($order["email"] == $k){
                    $totalCount++;
                    $totalSpent += $order["price"];
                }
            }

            $userObj["orderCount"] = $totalCount;
            $userObj["Total"] = $totalSpent;
            
            array_push($out, $userObj);
        }
    }

    usort($out, function($a, $b){
        return $a["name"] <=> $b["name"] ;
    });

    //var_dump($out) ;
   }





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <style>
        #container{
            background-color: pink;
            padding: 20px;
            text-align: center;
        }
        #container>a {
            text-decoration: none;
            margin: 10px;
        }
        #container>a:hover{
            color:red;
        }
        #main{
            text-align: center;
            padding: 15px;
            margin: 0 auto;
            
        }
        #main>h3,h2 {
            padding: 15px;
            text-align: center;
            
        }
        table{
            /* background-color: lightblue; */
            margin: 0 auto;
            padding: 15px;
            border-radius: 10px;
            border-collapse: collapse;
        }
        tr{
            
        }
        tr>*{
            padding: 10px 20px;
            /* background-color:red; */
        }
        td, th{
            margin-right: 10px;
            border-bottom: 1px solid #ddd;
        }

    </style>
</head>
<body>
    <div id="container">
        <a href="./" style="<?= !empty($_GET) ? "" : "text-decoration: underline; "?>">Home</a>
        <a href="?gender=female" style="<?= !empty($_GET) && $gender == "female" ? "text-decoration: underline;" : ""?>">Female</a>
        <a href="?gender=male"   style="<?= !empty($_GET) && $gender == "male" ? "text-decoration: underline;" : ""?>">Male</a>
    </div>

    <div id="main">
        <?php if(empty($_GET)): ?>
            <h3>Moein Faghih</h3>
            <h2>22301542</h2>
        <?php else:  ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Order Count</th>
                    <th>Total</th>
                </tr>

                <?php  foreach($out as $item): ?>
                    <tr>
                        <td><?= $item["name"]?></td>
                        <td><?= $item["phone"]?></td>
                        <td><?= $item["age"]?></td>
                        <td><?= $item["orderCount"]?></td>
                        <td>$ <?= $item["Total"]?></td>
                        
                    </tr>
                <?php endforeach  ?>
            </table>
        <?php endif; ?>

    </div>

</body>
</html>