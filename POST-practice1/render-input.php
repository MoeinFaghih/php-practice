<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
    <form method="post">
        <?php var_dump($out)?>
        <?php var_dump(isset($out["errors"]["reportNo"]))?>
        
        <table>
            <tr>
                <td>Department: </td>
                <td>
                    <select name="department">
                        <?php for($i=0; $i<count($departments) ; $i++): ?>
                            <option value="<?= $i ?>"><?= $departments[$i] ?> 
                            <?= isset($out["form"]["department"]) && $out["form"]["department"] == $i ? "selected" : ""?></option>
                        <?php endfor;?>
                    </select>
                </td>
            </tr>
            <tr style= "<?= isset($out["errors"]["reportNo"]) ? "background-color: #ddd" : "" ?>">
                <td style= "<?= isset($out["errors"]["reportNo"]) ? "color: red; font-style: italic;" : "" ?>" >Report No:</td>
                <td><input type="text" name="reportNo" value=<?= isset($out["form"]["reportNo"]) ? $out["form"]["reportNo"] : "" ?>></td>
            </tr>
            <tr>
                <td>Message: </td>
                <td>
                    <textarea name="message"><?= isset($out["form"]["message"]) ? $out["form"]["message"] : "" ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="submit"></td>
            </tr>
        </table>


    </form>
</body>
</html>