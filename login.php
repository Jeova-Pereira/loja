<?php
$con = new mysqli("localhost", "root", "", "cegonha");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $verificar_usuario = "SELECT * FROM usuario WHERE usuario = '$usuario';";
    $resultado_verificar_usuario = $con->query($verificar_usuario);

    if ($resultado_verificar_usuario->num_rows > 0) {
        $verificar_senha = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha';";
        $resultado_verificar_senha = $con->query($verificar_senha);

        if ($resultado_verificar_senha->num_rows > 0) {
            header("Location: index.php");
            exit();
        } else {
            echo '<script>alert("Senha incorreta!");</script>';
        }
    } else {
        echo '<script>alert("Usuário não existe!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css?v=<?=time()?>" defer>
</head>
<body>
    <div id="pag">
        <div id="div_form">
            <h2>Bem-vindo</h2>
            <p>Faça login para continuar</p>
            <form id="form" method="POST">
                <input type="text" name="usuario" placeholder="Usuário" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>