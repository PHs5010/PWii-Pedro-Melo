<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastro Moderno</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #0072ff, #00c6ff);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card {
        width: 420px;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0,0,0,0.25);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    input, label {
        width: 100%;
        font-size: 15px;
        margin: 8px 0;
    }
    input {
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }
    .btn {
        background: #0072ff;
        color: white;
        font-weight: bold;
        cursor: pointer;
        border: none;
        padding: 12px;
        border-radius: 6px;
        transition: .2s;
    }
    .btn:hover {
        background: #0056cc;
    }
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
</style>
</head>
<body>

<div class="card">
    <h2>Cadastro de Usuário</h2>

    <form method="post" action="">
    <input type="text" name="nome" placeholder="Nome completo" required>
    <input type="text" name="cpf" placeholder="CPF: 000.000.000-00" maxlength="14" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <input type="text" name="telefone" placeholder="Telefone (opcional)">
    <label>Data de Nascimento:</label>
    <input type="date" name="data_nascimento" required>
    <input type="submit" value="Cadastrar" class="btn">
</form>


    <hr>

    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Captura e limpa dados
    $nome = trim($_POST['nome']);
    $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $telefone = trim($_POST['telefone']);
    $data_nascimento = $_POST['data_nascimento'];

    // Validações
    if (!preg_match('/^[a-zA-ZÀ-ÿ ]+$/', $nome)) {
        echo "<p class='error'>Nome inválido.</p>"; exit;
    }
    if (!preg_match('/^[0-9]{11}$/', $cpf)) {
        echo "<p class='error'>CPF inválido. Apenas números.</p>"; exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='error'>E-mail inválido.</p>"; exit;
    }
    if (strlen($senha) < 6) {
        echo "<p class='error'>A senha deve ter pelo menos 6 caracteres.</p>"; exit;
    }
    if ($telefone !== "" && !preg_match('/^[0-9()\- ]+$/', $telefone)) {
        echo "<p class='error'>Telefone inválido.</p>"; exit;
    }
    if (empty($data_nascimento)) {
        echo "<p class='error'>Data de nascimento é obrigatória.</p>"; exit;
    }

    // Hash da senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Conexão com banco
    $conn = new mysqli("localhost","root","","roubardados");
    if ($conn->connect_error) {
        die("<p class='error'>Erro de conexão: ".$conn->connect_error."</p>");
    }

    // Verifica duplicidade de email/CPF
    $check = $conn->prepare("SELECT id FROM usuarios WHERE email=? OR cpf=? LIMIT 1");
    $check->bind_param("ss", $email, $cpf);
    $check->execute();
    $check->store_result();
    if ($check->num_rows>0) { 
        echo "<p class='error'>E-mail ou CPF já cadastrado.</p>"; 
        exit; 
    }
    $check->close();

    // Inserção segura
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, cpf, email, senha, telefone, data_nascimento) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$nome,$cpf,$email,$senha_hash,$telefone,$data_nascimento);

    if ($stmt->execute()) {
        echo "<p class='success'>✔ Usuário cadastrado com sucesso!</p>";
        echo "<b>Nome:</b> $nome<br>";
        echo "<b>E-mail:</b> $email<br>";
        echo "<b>Data de nascimento:</b> $data_nascimento<br>";
    } else {
        echo "<p class='error'>Erro: ".$stmt->error."</p>";
    }

    $stmt->close();
    $conn->close();
}
?>


</div>
</body>
</html>