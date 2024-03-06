<?php

include '../../classes/Loja.php';

$loja = new Loja();

$operacao = $_POST['operacao'];

if($operacao == "list"){
    echo json_encode($loja->list());
}

if($operacao == "create"){
    $params = array();
    
    parse_str($_POST['data'], $params);
    $loja->formData = $params;


    echo json_encode($loja->create());
}

if($operacao == "update"){
    $params = array();
    parse_str($_POST['data'], $params);
    $id = $_POST['id'];
    $loja->formData = $params;
    
    echo json_encode($loja->update($id));
}

if($operacao == "delete"){
    $id = $_POST['data'];
    echo json_encode($loja->delete($id));
}

if($operacao == "view"){
    $id = $_POST['data'];
    echo json_encode($loja->view($id));
}

// if($operacao == "information"){
//     echo json_encode($loja->information());
// }

// if($operacao == "select"){
//     echo json_encode($loja->select());
// }