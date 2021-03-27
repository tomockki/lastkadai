<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form action="insert.php" method="post">
        <p>目標金額：<input type="number" name="mok" min="1">万円</p>
        <p>収入：<input type="number" name="shu" min="0">万円</p>
        <p>生活費：<input type="number" name="life" min="0">万円</p>
        <p>交際費：<input type="number" name="enj" min="0">万円</p>
        <p>貯金割合：<input type="number" name="par" min="1" max="100">％</p>
        <p><input type="submit" value="計算"></p>
    </form>
</body>
</html>