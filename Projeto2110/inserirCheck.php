<?php 
  
    include("conexao.php");

    $name = $_POST['name'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    

    $inserir = $pdo->prepare("insert into demo (name,idade,cpf)
                     values ('$name', '$idade', '$cpf')");
    $inserir->execute();

    header("location:kaline.php");


?>