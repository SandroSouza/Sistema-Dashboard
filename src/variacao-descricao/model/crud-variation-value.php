<?php

include '../../classes/Variacaovl.php';

$vl = new Variacaovl();


$operacao = $_POST['operacao'];

if($operacao == "list"){
    echo json_encode($vl->list());
}

if($operacao == "create"){
    $params = array();
    
    parse_str($_POST['data'], $params);
    $vl->formData = $params;

    echo json_encode($vl->create());
}

if($operacao == "update"){
    $params = array();
    parse_str($_POST['data'], $params);
    $id = $_POST['id'];
    $vl->formData = $params;
    
    echo json_encode($vl->update($id));
}

if($operacao == "delete"){
    $id = $_POST['data'];
    echo json_encode($vl->delete($id));
}

if($operacao == "view"){
    $id = $_POST['data'];
    echo json_encode($vl->view($id));
}