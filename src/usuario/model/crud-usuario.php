<?php

include '../../classes/Usuario.php';

$user = new Usuario();

$operacao = $_POST['operacao'];

if($operacao == "list"){
    echo json_encode($user->list());
}

if($operacao == "create"){
    $params = array();
    
    parse_str($_POST['data'], $params);
    $user->formData = $params;


    echo json_encode($user->create());
}

if($operacao == "update"){
    $params = array();
    parse_str($_POST['data'], $params);
    $id = $_POST['id'];
    $user->formData = $params;
    
    echo json_encode($user->update($id));
}

if($operacao == "delete"){
    $id = $_POST['data'];
    echo json_encode($user->delete($id));
}

if($operacao == "view"){
    $id = $_POST['data'];

    echo json_encode($user->view($id));
}

if($operacao == "login"){
    $login = $_POST['usuario'];
    $senha = $_POST['senha'];

    echo json_encode($user->login($login, $senha));
}

if($operacao == "logout"){
    echo json_encode($user->logout());
}

if($operacao == "validate"){
    echo json_encode($user->validade());
}