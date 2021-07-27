<?php
	include 'database/db.php';

	class Employee{

		private $table= "employee";

		private $name;
		private $email;
		private $phone;

		public function setName($n){

			$this->name= $n;
		}
		public function setEmail($e){

			$this->email= $e;
		}
		public function setPhone($p){

			$this->phone= $p;
		}

		public function insertInfo(){

			$insert= "insert into $this->table(name, email, phone) values(:name, :email, :phone)";
			$result= databaseClass::ourPrepareMethod($insert);
			$result->bindParam(':name', $this->name);
			$result->bindParam(':email', $this->email);
			$result->bindParam(':phone', $this->phone);

			return $result->execute();
		}

		public function getInfo(){

			$query= "select * from $this->table";
			$result= databaseClass::ourPrepareMethod($query);
			$result->execute();

			return $result->fetchAll();

		}

		//for updating
		public function helpToUpdate($id){

			$query= "select * from $this->table where id=:id";
			$result= databaseClass::ourPrepareMethod($query);
			$result->bindParam(':id', $id);
			$result->execute();
			return $result->fetch();
		}

		public function updateInfo($id){

			$update= "update $this->table set name=:name, email=:email, phone=:phone where id=:id";
			$result= databaseClass::ourPrepareMethod($update);

			$result->bindParam(':name',$this->name);
			$result->bindParam(':email',$this->email);
			$result->bindParam(':phone',$this->phone);
			$result->bindParam(':id',$id);

			return $result->execute();
		}
		
		//delete portion
		public function deleteInfo($id){

			$delete= "delete from $this->table where id=:id";
			$result= databaseClass::ourPrepareMethod($delete);

			$result->bindParam(':id', $id);
			return $result->execute();
		}
	}

?>