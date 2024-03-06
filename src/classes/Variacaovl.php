<?php

    class Variacaovl extends Conn
    {
        public object $conn;
        public array $formData;
        public int $id;


        public function list():array
        {
            $this->conn = $this->conectDb();

            $query_variacao = "select * from variacaoValor where idVariacaoDescricao = :dkvalor 
            order by id asc limit 20";
            $result = $this->conn->prepare($query_variacao);
            $result->bindParam(':dkvalor', $this->id);

            $result->execute();
            $retorno = $result->fetchAll();
            return $retorno;
        }


        public function create(){

            //var_dump($this->formData);
            $this->conn = $this->conectDb();

            $query = "insert into variacaoValor 
            (valor, idVariacaoDescricao) 
            values
            (:valor, :idVariacaoDescricao)";

            $addUser = $this->conn->prepare($query);

            $addUser->bindParam(':valor', $this->formData['valor']);
            $addUser->bindParam(':fkvalor', $this->formData['fkvalor']);

            $addUser->execute();

            if($addUser->rowCount()){

                return true;

            }else{

                return false;

            }
        }


        public function delete(){

            //var_dump($this->formData);
            $this->conn = $this->conectDb();

            $query = "delete from variacaoValor
            where id = :id";

            $addUser = $this->conn->prepare($query);

            $addUser->bindParam(':id', $this->formData['id']);

            $addUser->execute();

            if($addUser->rowCount()){

                return true;

            }else{

                return false;

            }
        }


        public function update(){

            $this->conn = $this->conectDb();

            $query = "UPDATE variacaoValor SET 
              valor = :valor,
              idVariacaoDescricao = :fkvalor
              WHERE codigoSKU = :codsdk";

            $addUser = $this->conn->prepare($query);

            $addUser->bindParam(':descr', $this->formData['descr']);
            $addUser->bindParam(':fkvalor', $this->formData['fkvalor']);

            if ($addUser->execute()) {
                return true;
            } else {
                // Print SQL error information for debugging
                print_r($addUser->errorInfo());
                return false;
            }
        }

        
        public function view(){
            $this->conn = $this->conectDb();
            $query = "select * from variacaoValor where id like :id order by id asc limit 1" ;
            $result_user = $this->conn->prepare($query);
            
            $result_user->bindParam(':id', $this->id);
            $result_user->execute();
            $value = $result_user->fetch();
            return $value;

        }
     
    }