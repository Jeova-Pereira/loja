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

if (isset($_POST['id_produto'])) {
    $id_produto = $_POST['id_produto'];

    $sql = "DELETE FROM produto WHERE idproduto = '$id_produto'";
    if ($conn->query($sql) === TRUE) {
        echo "Produto removido com sucesso!";
    } else {
        echo "Erro ao remover o produto!";
    }
}

$conn->close();
?>