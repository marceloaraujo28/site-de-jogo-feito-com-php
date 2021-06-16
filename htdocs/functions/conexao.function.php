<?php
    class dbConfig{
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $db = 'wyd';

        protected $connection;

        public function __construct(){
            
                $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);

            return $this->connection;
        }
    }



?>