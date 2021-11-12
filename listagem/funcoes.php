<?php

$sql = "SELECT * FROM tbl_pessoa";

$resultado = mysqli_query($conexao, $sql);

function listar($resultado){

    $lista = mysqli_fetch_array($resultado);

    echo $lista;
}
?>


