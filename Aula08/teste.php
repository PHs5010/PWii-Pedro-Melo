<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>teste</title>
    </head>
    <body>
        <form action="teste.php" method="post">
            Nome: <input type="text" name="nome"> <br><br>
            Idade: <input type="number" name="idade"> <br><br>
            CPF: <input type="text" name="cpf"> <br><br>
            <input type="submit" value="Roubar dados">
        </form>
    </body>
</html>


<?php

    $servername = "xampp";
    $username = "root";
    $password = "";
    $database = "roubardados";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    mysqli_close($conn);
    
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];

    echo "<br> Nome: ${nome} <br><br>";
    echo "Idade: ${idade} <br><br>";
    echo "CPF: ${cpf} <br><br>";



?>