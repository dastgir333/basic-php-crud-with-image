<?php

class Database{

	private $db_host="localhost";
		private $db_user="root";
		private $db_pass="";
		private $db_name="tesuting";
		private $mysqli="";
		private $result= array();

		private $conn="false";

	public function __construct(){

		if(!$this->conn){
			$this->mysqli =new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

			if($this->mysqli->connect_error){
				array_push($this->result,$this->mysqli->connect_error);
				return false;

			}

		}else{
			return true;
		}


	}


	// function to insert into database

	public function insert(){


	}

  // function to update row in database

	public function update(){

	}

	// function to delete table or row from database

	public function delete(){

	}
}



?>