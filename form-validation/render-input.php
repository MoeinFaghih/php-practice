<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <td>Singer/Band: </td>
                <td>
                    <select name="singer">
                        <option value="0" <?= isset($out["form"]["singer"]) && $out["form"]["singer"] == 0 ? "selected" : "" ?> >Teoman</option>
                        <option value="1" <?= isset($out["form"]["singer"]) && $out["form"]["singer"] == 1 ? "selected" : "" ?> >Mor Ve Otesi</option>
                        <option value="2" <?= isset($out["form"]["singer"]) && $out["form"]["singer"] == 2 ? "selected" : "" ?> >Feridun Duzagac</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>VIP: </td>
                <td>
                    <input type="checkbox" name="vip" <?= isset($out["form"]["vip"]) ? "checked" : "" ?>>
                </td>
            </tr>
            <tr class = <?= isset($out["errors"]["number"]) ? "error" : "" ?>>
                <td># of Person: </td>
                <td>
                    <input type="text" name="number" value="<?= isset($out["form"]["number"]) ? $out["form"]["number"] : "" ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="RESERVE">
                </td>
                
            </tr>
        </table>

        <div id="errorContainer">
            <?= isset($out["errors"]["number"]) ? $out["errors"]["number"] : "" ?>
        </div>
    </form>
</body>
</html>