<?php
include 'Conn.php';
    class VariacaoDescricao extends Conn
    {
        public object $conn;
        public array $formData;
        public int $id;


        public function list():array {
            $this->conn = $this->conectDb();
            $query_variacao = "SELECT * from variacaodescricao order by id asc limit 10";
            $result = $this->conn->prepare($query_variacao);
            $result->execute();
            $retorno = $result->fetchAll();
            return $retorno;
        }


        public function create(){

            //var_dump($this->formData);
            $this->conn = $this->conectDb();

            $query = "INSERT into variacaodescricao 
            (descricao) 
            values
            (:descricao)";

            $addUser = $this->conn->prepare($query);
            $addUser->bindParam(':descricao', $this->formData['descricao']);

            $addUser->execute();
            if($addUser->rowCount()){
                $retorno =[
                    'status'=> 1
                ];

                return  $retorno;
            }else{
                return false;
            }
        }


        public function delete($id){

            //var_dump($this->formData);
            $this->conn = $this->conectDb();

            $query = "DELETE from variacaoDescricao
            where id = :id";

            $addUser = $this->conn->prepare($query);
            $addUser->bindParam(':id', $id, PDO::PARAM_INT);
            $addUser->execute();

            if($addUser->rowCount()){

                return true;

            }else{

                return false;

            }
        }


        public function update($id){

            $this->conn = $this->conectDb();

            $query = "UPDATE variacaodescricao SET descricao = :descricao WHERE id = :id";

            $addUser = $this->conn->prepare($query);
            $addUser->bindParam(':id', $id, PDO::PARAM_INT);
            $addUser->bindParam(':descricao', $this->formData['descricao']);

            if ($addUser->execute()) {
                return true;
            } else {
                // Print SQL error information for debugging
                print_r($addUser->errorInfo());
                return false;
            }
        }

        
        public function view($id){
            $this->conn = $this->conectDb();
            $query = "SELECT * from variacaodescricao WHERE id = :id" ;
            $result_user = $this->conn->prepare($query);
            $result_user->bindParam(':id', $id, PDO::PARAM_INT);
            $result_user->execute();
            $value = $result_user->fetch();
            return $value;
        }
    
    }