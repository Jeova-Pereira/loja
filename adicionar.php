<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "cegonha";

$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_produto = $_POST['nome_produto'];
    $preco = $_POST['preco'];
    $imagem_produto = $_POST['imagem_produto'];
    $categoria_idcategoria = $_POST['categoria_idcategoria'];

    $sql = "INSERT INTO produto (nome_produto, preco, imagem_produto, categoria_idcategoria) 
            VALUES ('$nome_produto', '$preco', '$imagem_produto', '$categoria_idcategoria')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Produto adicionado com sucesso!');</script>";
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Erro ao adicionar produto!');</script>";
    }
}

$conn->close();
?>