<?php 
    $comando     = @$_GET['Comando'];
    $dataCriacao = $_GET['Data_Criacao'];
    $curDate     = date('Y-m-d');

    $arrCheckDate = explode('-', $dataCriacao);
    $checkDate = array();
    $checkDate = checkdate((int)@$arrCheckDate[1], (int)@$arrCheckDate[2], (int)@$arrCheckDate[0]);

    if($checkDate === false){
        echo 'Data de Criação invalida';
        exit();
    }else if($comando != 'Listar'){
        echo 'Comando invalido';
        exit();
    }

    $mensagem = $curDate.'||'.$comando.'||'.$dataCriacao;

    $algoritmo = "AES-256-CBC";
    $chave     = "animal@2127";
    $iv        = "aKtHLHD8bVQ3TGb7";

    $cripto = openssl_encrypt($mensagem, $algoritmo, $chave, OPENSSL_RAW_DATA, $iv);
    $cripto64 = base64_encode($cripto);

    echo $cripto64;
?>