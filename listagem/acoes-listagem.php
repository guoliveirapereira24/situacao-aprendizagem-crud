<?php

require_once('../database/conexao.php');

if(isset($_GET)){
    $acao = $_GET["acao"];
}else{
    $acao = $_POST["acao"];
}



switch ($acao) {

    case "deletar":

        // echo 'teste';exit;

        $cod_pessoa = $_GET["cod_pessoa"];

        $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";
    //    echo $sql;exit;
       
        $resultado = mysqli_query($conexao, $sql);
        
        // $pessoa = mysqli_fetch_array($resultado);

        header("location: index.php");

    break;



    case "editar":

        $cod_pessoa = $_GET["cod_pessoa"];
                
        /**     CAPTURA OS DADOS DE TEXTO E DE NÚMERO   */
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];
        $cod_pessoa = $_POST["cod_pessoa"];
        
        /** MONTAGEM E EXECUÇÃO DA INSTRUÇÃO SQL DE UPDATE **/

        $sqlUpdate = "UPDATE tbl_pessoa SET 
                        nome = '$nome',
                        sobrenome = '$sobrenome',
                        email = '$email',
                        celular = '$celular',
                        cod_pessoa = $cod_pessoa";

        $sqlUpdate .= "WHERE id = $cod_pessoa";                

        $resultado = mysqli_query($conexao, $sqlUpdate);

        header("location: ../listagem/index.php");

    break;
    
    default:

        break;
    
}

?>