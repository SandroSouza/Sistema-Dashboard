<?php
include 'Conn.php';
    class Usuario extends Conn
    {
        public object $conn;
        public array $formData;
        public int $id;


        public function list(): array{
        $this->conn = $this->conectDb();

        $query = "SELECT * FROM usuario ORDER BY id ASC LIMIT 10";
        $result = $this->conn->prepare($query);
        $result->execute();
        $retorno = $result->fetchAll(PDO::FETCH_ASSOC);
        return $retorno;
        }

        public function create(){
            $this->conn = $this->conectDb();

            $query = "INSERT INTO usuario (nome, indentidade, email, senha, idTipoUsuario) VALUES (:nome, :indentidade, :email, :senha, idTipoUsuario)";
            $addUser = $this->conn->prepare($query);
            $addUser->bindParam(':nome', $this->formData['nome']);
            $addUser->bindParam(':indentidade', $this->formData['indentidade']);
            $addUser->bindParam(':email', $this->formData['email']);
            $addUser->bindParam(':senha', $this->formData['senha']);
            $addUser->bindParam(':idTipoUsuario', $this->formData['idTipoUsuario']);

            if ($addUser->execute()) {
                $retorno =[
                    'status'=> 1
                ];

                return  $retorno;
            } else {
                // Print SQL error information for debugging
                print_r($addUser->errorInfo());
                return false;
            }
        }

        public function delete($id){
            $this->conn = $this->conectDb();

            $query = "DELETE FROM usuario WHERE id = :id";
            $deleteUser = $this->conn->prepare($query);
            $deleteUser->bindParam(':id', $id, PDO::PARAM_INT);

            if ($deleteUser->execute()) {
                $retorno =[
                    'status'=> 1
                ];

                return  $retorno;
            } else {
                // Print SQL error information for debugging
                print_r($deleteUser->errorInfo());
                return false;
            }
        }

        public function update($id){
            $this->conn = $this->conectDb();

            $query = "UPDATE usuario SET nome = :nome, indentidade = :indentidade, email = :email, senha = :senha, idTipoUsuario = :idTipoUsuario WHERE id = :id";
            $updateUser = $this->conn->prepare($query);

            $updateUser->bindParam(':id', $id, PDO::PARAM_INT);
            $updateUser->bindParam(':nome', $this->formData['nome']);
            $updateUser->bindParam(':indentidade', $this->formData['indentidade']);
            $updateUser->bindParam(':email', $this->formData['email']);
            $updateUser->bindParam(':senha', $this->formData['senha']);
            $updateUser->bindParam(':idTipoUsuario', $this->formData['idTipoUsuario']);

            if ($updateUser->execute()) {
                return true;
            } else {
                // Print SQL error information for debugging
                print_r($updateUser->errorInfo());
                return false;
            }
        }

        public function view($id){
            $this->conn = $this->conectDb();
        
            $query = "SELECT * FROM usuario WHERE id = :id";
            $result_user = $this->conn->prepare($query);
            $result_user->bindParam(':id', $id, PDO::PARAM_INT); // Use PDO::PARAM_INT se $id for um número inteiro
            $result_user->execute();
            
            $value = $result_user->fetch(PDO::FETCH_ASSOC);
            
            
            return $value;
        }

        public function login($login, $senha){
            $this->conn = $this->conectDb();
            $senhaCript = md5($senha);
            // var_dump($senhaCript);
            $query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";

            $result_user = $this->conn->prepare($query);
            $result_user->bindParam(':email', $login, PDO::PARAM_STR); 
            $result_user->bindParam(':senha', $senhaCript, PDO::PARAM_STR); 

            $result_user->execute();
            
            $value = $result_user->fetch(PDO::FETCH_ASSOC);

            
            if($value){
                session_start();
                $_SESSION['ID'] = $value['id'];
                $_SESSION['email'] = $value['email'];
                $_SESSION['tipo'] = $value['idTipoUsuario'];
                $_SESSION['nome'] = $value['nome'];

                $response =[
                    "mensagem" => "Uusario valido",
                    "tipo" => $value['idTipoUsuario'],
                    'status'=> 1
                ];
                return $response;

            }else{
                $response =[
                    "mensagem" => "ERROR: Senha invalida",
                    "status" => 0
                ];
                return $response;
            }
        
            // var_dump($json);
            // return $json;
        }

        public function validade(){
            session_start();
            if(isset($_SESSION['ID'])){
                $json=[
                    "status" => 1,
                    "login" =>  $_SESSION['email'],
                    "tipo" => $_SESSION['tipo'],
                    "nome" => $_SESSION['nome']
                ];
            }else{
                
                $json=[
                    "status"  => 0,
                    "mensagem" => 'Usuario não logado'
                ]; 
            }

            return $json;
        }

        public function logout(){
            session_start();
            session_destroy();
            $json=[
                "status"  => 1,
                "mensagem" => 'Usuario deslogado'
            ]; 
            return $json;
        }
}