<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "cegonha";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if (isset($_POST['id']) && !isset($_POST['nome_produto'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM produto WHERE idproduto = $id;";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        echo json_encode($linha);
    } else {
        echo json_encode(['erro' => 'Produto não encontrado']);
    }

    $conn->close();
    exit();
}

if (
    isset($_POST['idproduto']) &&
    isset($_POST['nome_produto']) &&
    isset($_POST['preco']) &&
    isset($_POST['imagem_produto']) &&
    isset($_POST['categoria_idcategoria'])
) {
    $id = $_POST['idproduto'];
    $nome = $_POST['nome_produto'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem_produto'];
    $categoria = $_POST['categoria_idcategoria'];

    $editar = "UPDATE produto SET 
        nome_produto = '$nome', 
        preco = $preco, 
        imagem_produto = '$imagem', 
        categoria_idcategoria = $categoria 
        WHERE idproduto = $id;";
    if ($conn->query($editar) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}

$conn->close();
?>