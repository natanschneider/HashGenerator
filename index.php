<?php
    date_default_timezone_set('America/Sao_Paulo');
    $tokenDate = date('Y-m-d H');

    $tokenDate = md5('token2104'.$tokenDate.'token2104');

    $token = @$_GET['Token'];
    $dataCriacao = @$_GET['Data_Criacao'];
    $comando = @$_GET['Comando'];

    $arrCheckDate = explode('-', $dataCriacao);
    $checkDate = array();
    $checkDate = checkdate((int)@$arrCheckDate[1], (int)@$arrCheckDate[2], (int)@$arrCheckDate[0]);

    if($comando == 'Listar'){
        if($dataCriacao == ''){
            echo 'Data de Criação invalido';
            exit();
        }else if($checkDate === false){
            echo 'Data de Criação invalida';
            exit();
        }
    }

    if($token == $tokenDate){
        $array_values = array();

        $array_values[0]['id']    = 45;
        $array_values[0]['nome']  = 'José Carlos';
        $array_values[0]['idade'] = 75;
        $array_values[0]['cel']   = '519985758';  
        $array_values[0]['email'] = 'josecarlos@gmail.com';  
        $array_values[0]['data_criacao'] = '2022-06-28';  

        $array_values[1]['id']    = 46;
        $array_values[1]['nome']  = 'Maria Clara';
        $array_values[1]['idade'] = 68;
        $array_values[1]['cel']   = '519966666';  
        $array_values[1]['email'] = 'mariaclara@yahoo.com.br';
        $array_values[1]['data_criacao'] = '2022-06-28';

        $array_values[2]['id']    = 47;
        $array_values[2]['nome']  = 'João Medeiros';
        $array_values[2]['idade'] = 41;
        $array_values[2]['cel']   = '519955555';  
        $array_values[2]['email'] = 'joaomed@gmail.com';
        $array_values[2]['data_criacao'] = '2022-06-29';

        if($comando == 'Listar'){
            foreach($array_values as $key=>$value){
                if($value['data_criacao'] == $dataCriacao){
                    $new_array_values[] = $value; 
                }
            }
            $return = json_encode($new_array_values);
            echo $return;
        }else{
            echo 'Sem Comando';
        } 
    }else{
        echo 'Token invalido. Nice try stupid bitch';
    }
?>