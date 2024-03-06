<?php

    abstract class Conn
    {
        public $host = "localhost";
        public $user = "root";
        public $pass = "";
        public $dbname = "teste";
        public $port  = 3306;
        public object $connect;

        public function conectDb()
        {
            try{
                $this->connect = new PDO("mysql:host".$this->host.";port=".$this->port.";dbname=".$this->dbname, $this->user, $this->pass);
                //echo "Conexão realizada com sucesso!<br>";
                return $this->connect;
            }catch(Exception $err){
                die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador.');
                /**
                 * echo "Erro: Conexão não realizada com sucesso! Erro gerado: ".$err->getMessage();
                 */
            }
        }
    }
