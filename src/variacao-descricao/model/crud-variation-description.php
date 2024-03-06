<?php

include '../../classes/VariacaoDescricao.php';

$vd = new VariacaoDescricao();


$operacao = $_POST['operacao'];

if($operacao == "list"){
    echo json_encode($vd->list());
}

if($operacao == "create"){
    $params = array();
    
    parse_str($_POST['data'], $params);
    $vd->formData = $params;

    echo json_encode($vd->create());
}

if($operacao == "update"){
    $params = array();
    parse_str($_POST['data'], $params);
    $id = $_POST['id'];
    $vd->formData = $params;
    
    echo json_encode($vd->update($id));
}

if($operacao == "delete"){
    $id = $_POST['data'];
    echo json_encode($vd->delete($id));
}

if($operacao == "view"){
    $id = $_POST['data'];
    echo json_encode($vd->view($id));
}