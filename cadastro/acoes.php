<?php

//session_start();

require("../database/conexao.php");

function validarCampos(){


//ARRAY DAS MENSAGENS DE ERRO
$erros = [];

//VALIDAÇÃO DO NOME
if ($_POST["nome"] == "" || !isset($_POST["nome"])) {
    
    $erros[] = "O CAMPO NOME É OBRIGATÓRIO";

}

    //VALIDAÇÃO DO SOBRENOME
    if ($_POST["sobrenome"] == "" || !isset($_POST["sobrenome"])) {
    
        $erros[] = "O CAMPO SOBRENOME É OBRIGATÓRIO";

    }

    if ($_POST["email"] == "" || !isset($_POST["email"])) {
    
        $erros[] = "O CAMPO EMAIL É OBRIGATÓRIO";

    }
    if ($_POST["celular"] == "" || !isset($_POST["celular"])) {
    
        $erros[] = "O CAMPO CELULAR É OBRIGATÓRIO";

    }
    return $erros;
}


switch ($_POST["acao"]) {

    case 'inserir':

    #   INSERÇÃO DE DADOS NA BASE DE DADOS DO MYSQL:    

    #RECEBIMENTO DOS DADOS:    
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];
        $cod_pessoa = $_POST["cod_pessoa"];


    //CRIAÇÃO DA INSTRUÇÃO SQL DE INSERÇÃO:
        $sql = "INSERT INTO tbl_pessoa 
            (nome, sobrenome, email, celular) 
            VALUES ('$nome', '$sobrenome', '$email', '$celular')";
    

    // var_dump($sql);


    //EXCUÇÃO DO SQL DE INSERÇÃO:
        $resultado = mysqli_query($conexao, $sql);    

    //REDIRECIONAR PARA INDEX:
        header('location: index.php');

    break;
    


    case "deletar":

        $cod_pessoa = $_POST["cod_pessoa"];

        $sql = "DELETE FROM tbl_pessoa WHERE id = $cod_pessoa";
        
        $resultado = mysqli_query($conexao, $sql);
        
        $pessoa = mysqli_fetch_array($resultado);
        

        header("location: index.php");

    break;



    case "editar":

        $cod_pessoa = $_POST["cod_pessoa"];

        /**     PROCESSO DE VALIDAÇÃO    */
        $erros = validarCampos();

        if (count($erros) > 0) {

            $_SESSION["erros"] = $erros;

            header("location: cadastro/editar.php?id=$cod_pessoa");

            exit;
        }

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