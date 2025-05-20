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
        INNER JOIN categoria c ON p.categoria_idcategoria = c.idcategoria";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="index.js" defer></script>
    <link rel="stylesheet" href="teste.css?v=<?php echo time(); ?>">
</head>
<body>
    <div id="nav">
        <img id="logo" src="imagens/logo.png">
        <div id="divpesquisa">
            <input id="barrapesquisa">
            <div id="divlupa">
                <img id="lupa" src="imagens/iconlupa.png">
            </div>
        </div>
        <div id = "grupo">
            <button onclick="adicionar()">Adicionar produto</button>
            <img id="logar" src="imagens/iconlogin.png">
        </div>
    </div>

    

    <div id="popup" class="popup">
        <div class="divpopup">
            <span class="fechar" onclick="fechar()">Fechar</span>
            <h2>Produto</h2>
            <form method="POST" action="adicionar.php" id="form-produto">
                <input type="hidden" id="input_idproduto" name="idproduto">
                <label>Nome do Produto:</label>
                <input type="text" id="input_nome_produto" name="nome_produto" required>
                <label>Preço:</label>
                <input type="number" id="input_preco" name="preco" required>
                <label>URL da Imagem:</label>
                <input type="text" id="input_imagem_produto" name="imagem_produto" required>
                <label>Categoria:</label>
                <input type="text" id="input_categoria_idcategoria" name="categoria_idcategoria">
                <button type="submit">Salvar</button>
            </form>
        </div>  
    </div>
    <div class="grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<input type="hidden" value="'.$row["idproduto"].'" class="id_produto">';
                echo '<button class="editar-btn" onclick="editar(event)">Editar</button>';
                echo '<button class="remover-btn" onclick="remover(event)">Remover</button>';                       
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