function adicionar(){
    document.getElementById('popup').style.display = "flex";
    document.getElementById('form-produto').action = "adicionar.php";
    document.getElementById('input_idproduto').value = "";
}

function editar(event) {
    const card = event.target.closest('.card');
    const id = card.querySelector('.id_produto').value;

    document.getElementById('form-produto').action = "editar.php";
    document.getElementById('popup').style.display = "flex";

    $.ajax({
        url: 'editar.php',
        type: 'POST',
        data: { id: id },
        success: function(response) {
            const data = JSON.parse(response);
            document.getElementById('input_idproduto').value = data.idproduto;
            document.getElementById('input_nome_produto').value = data.nome_produto;
            document.getElementById('input_preco').value = data.preco;
            document.getElementById('input_imagem_produto').value = data.imagem_produto;
            document.getElementById('input_categoria_idcategoria').value = data.categoria_idcategoria;
        },
        error: function() {
            alert("Erro ao buscar informações do produto.");
        }
    });
}

function remover(event) {
    const card = event.target.closest('.card');
    const id = card.querySelector('.id_produto').value;
    $.ajax({
        url: 'remover.php',
        type: 'POST',
        data: { id_produto: id },
        success: function() {
            card.remove();
            location.reload();
        },
        error: function() {
            alert("Erro ao tentar remover o produto.");
        }
    });
}

function fechar(){
    document.getElementById('popup').style.display = "none";
    document.getElementById('form-produto').reset();
    document.getElementById('form-produto').action = "";
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.card').forEach(function(div) {
        div.addEventListener("mouseenter", function() {
            this.querySelector('.editar-btn').style.display = "block";
            this.querySelector('.remover-btn').style.display = "block";
        });
        div.addEventListener("mouseleave", function() {
            this.querySelector('.editar-btn').style.display = "none";
            this.querySelector('.remover-btn').style.display = "none";
        });
    });
});

document.getElementById('logar').addEventListener('click', function(){
    window.location.href = "login.php"
})