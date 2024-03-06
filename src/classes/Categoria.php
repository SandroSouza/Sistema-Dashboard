<?php
include 'Conn.php';
    class Categoria extends Conn
    {
        public object $conn;
        public array $formData;
        public int $id;


        public function list(): array{
            $this->conn = $this->conectDb();

            $query = "SELECT * FROM categoria ORDER BY id ASC LIMIT 10";
            $result = $this->conn->prepare($query);
            $result->execute();
            $retorno = $result->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
        }

        public function create(){
            $this->conn = $this->conectDb();

            $query = "INSERT INTO categoria (nome, descricao) VALUES (:nome, :descricao)";
            $addUser = $this->conn->prepare($query);
            $addUser->bindParam(':nome', $this->formData['nome']);
            $addUser->bindParam(':descricao', $this->formData['descricao']);

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

            $query = "DELETE FROM categoria WHERE id = :id";
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

            $query = "UPDATE categoria SET nome = :nome, descricao = :descricao WHERE id = :id";
            $updateUser = $this->conn->prepare($query);

            $updateUser->bindParam(':id', $id, PDO::PARAM_INT);
            $updateUser->bindParam(':nome', $this->formData['nome']);
            $updateUser->bindParam(':descricao', $this->formData['descricao']);

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
        
            $query = "SELECT * FROM categoria WHERE id = :id";
            $result_user = $this->conn->prepare($query);
            $result_user->bindParam(':id', $id, PDO::PARAM_INT); // Use PDO::PARAM_INT se $id for um número inteiro
            $result_user->execute();
            
            $value = $result_user->fetch(PDO::FETCH_ASSOC);
            
            
            return $value;
        }
}