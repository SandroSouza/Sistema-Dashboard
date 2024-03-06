<?php

include '../../classes/Produto.php';

$prod = new Produto();

$operacao = $_POST['operacao'];

if($operacao == "list"){
    echo json_encode($prod->list());
}

if($operacao == "create"){
    $params = array();
    parse_str($_POST['data'], $params);
    $prod->formData = $params;

    echo json_encode($prod->create());
}

if($operacao == "update"){
    $params = array();
    parse_str($_POST['data'], $params);
    $id = $_POST['id'];
    $prod->formData = $params;
    
    echo json_encode($prod->update($id));
}

if($operacao == "delete"){
    $id = $_POST['data'];
    echo json_encode($prod->delete($id));
}

if($operacao == "view"){
    $id = $_POST['data'];

    echo json_encode($prod->view($id));
}