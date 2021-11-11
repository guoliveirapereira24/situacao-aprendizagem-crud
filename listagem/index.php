<?php
    include('../componentes/header.php');
    require('../database/conexao.php');
    require('../listagem/funcoes.php');

    $sql = "SELECT * FROM tbl_pessoa";       
    $resultado = mysqli_query($conexao, $sql);

    echo $lista;
?>

<div class="container">

    <br/>
    
    <table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
            <tr>
               <!-- <th>1</th>
                <th>TESTE DE NOME</th>
                <th>TESTE DE SOBRENOME</th>
                <th>TESTE DE EMAIL</th>
                <th>TESTE DE CELULAR</th>
            -->
            <?php
                while($pessoa = mysqli_fetch_array($resultado)){
                    ?>
                    <th>
                        <?php echo $pessoa["cod_pessoa"]?>
                  
                    <th>
                        <?php echo $pessoa["nome"]?>
                    </th>
                    <th>
                        <?php echo $pessoa["sobrenome"]?>
                    </th>    
                    <th>
                        <?php echo $pessoa["email"]?>
                    </th>
                    <th>
                        <?php echo $pessoa["celular"]?>
                    </th>
                    <th>
                        <a href="editar.php?cod_pessoa=<?php echo $dados["cod_pessoas"]?>">EDITAR</a>
                        <a href="acoes.php?cod_pessoa=<?php echo $dados["cod_pessoas"]?>.'&acoes=deletar">EXCLUIR</a>
                    </th>
                </tr>
                    <?php }?>

         <!--          <button class="btn btn-warning">Editar</button>

                    <form action="" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="">
                        <button class="btn btn-danger">Excluir</button>
                    </form>
-->
    </tbody>

    </table>

</div>

<?php
    include('../componentes/footer.php');
?>