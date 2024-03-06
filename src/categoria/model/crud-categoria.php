<?php

include '../../classes/Categoria.php';

$cat = new Categoria();

$operacao = $_POST['operacao'];

if($operacao == "list"){
    echo json_encode($cat->list());
}

if($operacao == "create"){
    $params = array();
    
    parse_str($_POST['data'], $params);
    $cat->formData = $params;


    echo json_encode($cat->create());
}

if($operacao == "update"){
    $params = array();
    parse_str($_POST['data'], $params);
    $id = $_POST['id'];
    $cat->formData = $params;
    
    echo json_encode($cat->update($id));
}

if($operacao == "delete"){
    $id = $_POST['data'];
    echo json_encode($cat->delete($id));
}

if($operacao == "view"){
    $id = $_POST['data'];
   
    echo json_encode($cat->view($id));
}