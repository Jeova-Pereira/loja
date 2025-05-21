<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "cegonha";

$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT p.idproduto, p.nome_produto, p.preco, p.imagem_produto, c.nome_categoria 
        FROM produto p 
        INNER JOIN categoria c ON p.categoria_idcategoria = c.idcategoria order by rand()";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="user.js?v=<?=time()?>" defer></script>
    <link rel="stylesheet" href="user.css?v=<?php echo time(); ?>">
</head>
<body>
    <div id="nav">
        <img id="logo" src="imagens/logo5.png">
        <div id="divpesquisa">
            <input id="barrapesquisa" placeholder="Pesquisar">
            <div id="divlupa">
                <img id="lupa" src="imagens/iconlupa.png">
            </div>
        </div>
        
        <img id="logar" src="imagens/iconlogin.png">
    </div>
    <h1>PRODUTOS</h1>

    <div class="grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="imagens/' . $row['imagem_produto'] . '" alt="' . $row['nome_produto'] . '">';
                echo '<div class="info">';
                echo '<p><strong>' . $row['nome_produto'] . '</strong></p>';
                echo '<p>R$ ' . number_format($row['preco'], 2, ',', '.') . '</p>';
                echo '<p>' . $row['nome_categoria'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>Nenhum produto encontrado.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
