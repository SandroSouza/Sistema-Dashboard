<?php
include 'Conn.php';
    class Loja extends Conn
    {
        public object $conn;
        public array $formData;
        public int $id;

        // listando lojas cadastradas
        public function list():array {
            $this->conn = $this->conectDb();
            $query = "SELECT * FROM loja ORDER BY id ASC";
            $result = $this->conn->prepare($query);
            $result->execute();
            $retorno = $result->fetchAll();
            return $retorno;
        }

        // função para criar loja
        public function create(){
            //var_dump($this->formData);
            $this->conn = $this->conectDb();
            $query = "
                INSERT INTO loja (nome, logo, banner, qtdproduto, corfundo, corfonte, area, cnpj, idUsuario) 
                VALUES (:nome, :logo, :banner, :qtdproduto, :corfundo, :corfonte, :area, :cnpj, :idUsuario)
            ";
            $result = $this->conn->prepare($query);
            $result->bindParam(':nome', $this->formData['nome']);
            $result->bindParam(':logo', $this->formData['logo']);
            $result->bindParam(':banner', $this->formData['banner']);
            $result->bindParam(':qtdproduto', $this->formData['qtdproduto']);
            $result->bindParam(':corfundo', $this->formData['corfundo']);
            $result->bindParam(':corfonte', $this->formData['corfonte']);
            $result->bindParam(':area', $this->formData['area']);
            $result->bindParam(':cnpj', $this->formData['cnpj']);
            $result->bindParam(':idUsuario', $this->formData['idUsuario']);
            $result->execute();

            if($result->execute()){
                $retorno =[
                    'status'=> 1
                ];

                return  $retorno;
            } else {
                // Print SQL error information for debugging
                print_r($result->errorInfo());
                return false;
            }
        }

        // função para editar loja
        public function update($id){
            $this->conn = $this->conectDb();
            $query_loja = "UPDATE loja SET nome=:nome, logo=:logo, banner=:banner, qtdproduto=:qtdproduto,
            corfundo=:corfundo, corfonte=:corfonte, area=:area, cnpj = :cnpj WHERE idUsuario=:idUsuario";

            $edit_loja= $this->conn->prepare($query_loja);
            $edit_loja->bindParam(':id', $id, PDO::PARAM_INT);
            $edit_loja->bindParam(':nome', $this->formData['nome']);
            $edit_loja->bindParam(':logo', $this->formData['logo']);
            $edit_loja->bindParam(':banner', $this->formData['banner']);
            $edit_loja->bindParam(':qtdproduto', $this->formData['qtdproduto']);
            $edit_loja->bindParam(':corfundo', $this->formData['corfundo']);
            $edit_loja->bindParam(':corfonte', $this->formData['corfonte']);
            $edit_loja->bindParam(':area', $this->formData['area']);
            $edit_loja->bindParam(':cnpj', $this->formData['cnpj']);
            $edit_loja->bindParam(':idUsuario', $this->formData['idUsuario']);
            $edit_loja->execute();

            if($edit_loja->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        // deletar loja
        public function delete($id){
            //var_dump($this->formData);
            $this->conn = $this->conectDb();
            $query = "DELETE FROM loja WHERE id = :id";

            $result = $this->conn->prepare($query);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();

            if($result->rowCount()){
                return true;
            } else{
                return false;
            }
        }

        public function view($id){
            $this->conn = $this->conectDb();
            $query = "SELECT * FROM loja WHERE id like :id ORDER BY id ASC LIMIT 1";
            $result = $this->conn->prepare($query);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();
            $value = $result->fetch();
            return $value;

        }

        // public function information(){
        //     session_start();
        //     if(isset($_SESSION['ID'])){
        //         $json=[
        //             "status" => 1,
        //             "corfundo" =>  $_SESSION['email'],
        //             "corfonte" => $_SESSION['tipo'],
        //             "nome" => $_SESSION['nome'],
        //             "idUsuario" => $_SESSION['idUsuario']
        //         ];
        //     }else{
                
        //         $json=[
        //             "status"  => 0,
        //             "mensagem" => 'Loja não logada'
        //         ]; 
        //     }

        //     return $json;
        // }

        // public function select(){
        //     $this->conn = $this->conectDb();

        //     $id = "SELECT LAST_INSERT_ID() INTO @id";
        //     $query = "SELECT * FROM usuario WHERE id = :id";

        //     $result_loja = $this->conn->prepare($query);
        //     $result_loja->bindParam(';:id', $id, PDO::PARAM_INT);
        //     $result_loja->execute();

        //     $value = $result_loja->fetch(PDO::FETCH_ASSOC);
        //     var_dump($value);

        //     if($value){
        //         session_start();
        //             $_SESSION['ID'] = $value['id'];
        //             $_SESSION['nome'] = $value['nome'];
        //             $_SESSION['corfundo'] = $value['corfundo'];
        //             $_SESSION['corfonte'] = $value['corfonte'];
        //             $_SESSION['idUsuario'] = $value['idUsuario'];

        //             $response =[
        //                 "mensagem" => "Loja valida",
        //                 "idUsuario" => $value['idUsuario'],
        //                 'status'=> 1
        //             ];
        //             return $response;
        //     }
        // }
    }