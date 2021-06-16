<?php
 include_once 'conexao.function.php';
 
 class Crud extends dbConfig
 {
	 public function __construct()
	 {
		 parent::__construct();
	 }
	 
	 public function getData($query)
	 {
		 $result = mysqli_query($this->connection, $query);
		 
		 if ($result == false){
				return false;
                echo "nao deu!";
		 }
		 
		 $rows = array();
		 
		 while ($row = $result->fetch_assoc()) {
			 $rows[] = $row;
		 }
		 return $rows;
	 }
	 
	 public function execute($query)
	 {
		 $result = $this->connection->query($query);
		 
		 if($result == false){
			 echo 'Erro: não pode executar o comando.';
			 return false;
	 }else {
			 return true;
	 }
	 
 }
	public function delete($id, $table)
	{
		$query = "DELETE FROM $table WHERE cod_usu = $id";
		$result = $this->connection->query($query);
		
		if ($result == false){
			echo 'Erro: Não pode apagar o CODIGO' . $id . ' da tabela ' . $table;
			return false;
		}else {
			return true;
		}
		
	}
 
 
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}

    public function check_empty($data, $fields)
		{
			$msg = false;
			foreach ($fields as $values){
				if (empty($data[$values])){
					$msg = true;
				}
			}
			return $msg;
		}

    
 }
?>