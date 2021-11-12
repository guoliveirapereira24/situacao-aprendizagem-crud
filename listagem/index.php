<?php
    include('../componentes/header.php');
    require_once('../database/conexao.php');
    require_once('../listagem/funcoes.php');
    require_once('./acoes-listagem.php');
//  include('./acoes-listagem.php');


    $sql = "SELECT * FROM tbl_pessoa";       
    $resultado = mysqli_query($conexao, $sql);

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
                while($pessoa = mysqli_fetch_array($resultado)){?>
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
                        <button>
                            <a href="editar.php?cod_pessoa=<?php echo $pessoa["cod_pessoa"]?>&acao=editar">EDITAR</a>
                        </button>
                       <button class="btn"> 
                            <a href="acoes-listagem.php?cod_pessoa=<?php echo $pessoa["cod_pessoa"]?>&acao=deletar">EXCLUIR</a>
                       </button>
                    </th>
                </tr> 
                <?php } ?>
                
                <?php 
                    var_dump($pessoa["cod_pessoa"]);  
                ?>
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