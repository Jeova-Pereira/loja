<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "cegonha";

$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

if (isset($_POST['idcategoria'])) {
    $id = $_POST['idcategoria'];

    // Verifica se há produtos vinculados a essa categoria
    $check = $conn->query("SELECT * FROM produto WHERE categoria_idcategoria = $id");
    if ($check->num_rows > 0) {
        echo "erro_produto_vinculado";
        exit;
    }

    $sql = "DELETE FROM categoria WHERE idcategoria = $id";
    if ($conn->query($sql) === TRUE) {
        echo "sucesso";
    } else {
        echo "erro";
    }
} else {
    echo "id_invalido";
}
$conn->close();
?>
