<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $taxa = 16;
        $valorFinal = ($taxa * $_POST["value"] / 100) + $_POST["value"];
        $parcelado = $valorFinal / 10;
    ?>

    Valor total: <?php echo $valorFinal; ?><br>
    Valor de cada parcela (10x): <?php echo $parcelado; ?> 
</body>
</html>