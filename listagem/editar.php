<?php
    include('../componentes/header.php');
    require('../database/conexao.php');


    $idPessoa = $_GET['cod_pessoa'];

    $sql =  "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $idPessoa";

    $resultado = mysqli_query($conexao, $sql);

    $pessoa = mysqli_fetch_array($resultado);

?>


    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header">
                <h2>Edição</h2>
            </div>
            <div class="card-body">
                <form method="post" action="./acoes-listagem.php">
                    <input class="form-control" type="text" placeholder="Digite o nome" name="nome" id="nome" value="<?php echo $pessoa["nome"]?>">
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o sobrenome" name="sobrenome" id="sobrenome" value="<?php echo $pessoa["sobrenome"]?>">
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o email" name="email" id="email" value="<?php echo $pessoa["email"]?>">
                    <br />
                    <input class="form-control" type="text" placeholder="Digite celular" name="celular" id="celular" value="<?php echo $pessoa["celular"]?>">
                    <br />
                    <button class="btn btn-success">EDITAR</button>

                </form>
            </div>
        </div>
    </div>


<?php
    include('../componentes/footer.php');
?>