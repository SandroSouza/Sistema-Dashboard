<?php
include 'Conn.php';
    class Produto extends Conn
    {
        public object $conn;
        public array $formData;
        public int $id;


        public function list():array {
                $this->conn = $this->conectDb();

                $query_variacao = "SELECT * from Produto order by id asc limit 10";
                $result = $this->conn->prepare($query_variacao);
                $result->execute();
                $retorno = $result->fetchAll();
                return $retorno;
        }

        public function create(){
            //var_dump($this->formData);
            $this->conn = $this->conectDb();

            $query = "INSERT into Produto 
            (qtde, valor, modelo, idv1, idv2, idloja) 
            values
            (:qtde, :valor, :modelo, :idv1, :idv2, :idloja)";
            $addUser = $this->conn->prepare($query);
            $addUser->bindParam(':qtde', $this->formData['qtde']);
            $addUser->bindParam(':valor', $this->formData['valor']);
            $addUser->bindParam(':modelo', $this->formData['modelo']);
            $addUser->bindParam(':idv1', $this->formData['idv1']);
            $addUser->bindParam(':idv2', $this->formData['idv2']);
            $addUser->bindParam(':idloja', $this->formData['idloja']);
            

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

            $query = "DELETE from Produto where id = :id";
            $addUser = $this->conn->prepare($query);
            $addUser->bindParam(':id', $id, PDO::PARAM_INT);
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


        public function update($id){

            $this->conn = $this->conectDb();

            $query = "UPDATE Produto SET 
            qtde = :qtde, 
            valor = :valor, 
            modelo = :modelo, 
            idv1 = :idv1,
            idv2 = :idv2,
            idloja = :idloja 
            WHERE id = :id";

            $addUser = $this->conn->prepare($query);

            
            $addUser->bindParam(':id', $id, PDO::PARAM_INT);
            $addUser->bindParam(':qtde', $this->formData['qtde']);
            $addUser->bindParam(':valor', $this->formData['valor']);
            $addUser->bindParam(':modelo', $this->formData['modelo']);
            $addUser->bindParam(':idv1', $this->formData['idv1']);
            $addUser->bindParam(':idv2', $this->formData['idv2']);
            $addUser->bindParam(':idloja', $this->formData['idloja']);
            
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
            $query = "SELECT * from Produto WHERE id = :id" ;
            $result_user = $this->conn->prepare($query);
            $result_user->bindParam(':id', $id, PDO::PARAM_INT);
            $result_user->execute();
            $value = $result_user->fetch();
            return $value;
        }
    }