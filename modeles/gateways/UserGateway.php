<?php
class UserGateway
{
	// Attributs
	private $conn;

	// Constructeur
	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function getUserByEmail($email){
		$user=array();
		$user['email'] = ' ';
		$user['password'] = ' ';
		$requete = "SELECT * FROM User WHERE :email=email;";
		if(!$this->conn->executeQuery($requete,array(":email"=>array($email,PDO::PARAM_STR)))){
			return $user;
		}
			
		$res=$this->conn->getResults();
		if(count($res)>1){
			return $user;
		}
		foreach($res as $data){
			$user['email']=$data['email'];
			$user['password']=$data['password'];
		}
		return $user;
		
	}
	/*
	public function addUser($id, $email,$password):bool{
		$requete = "INSERT INTO User(id, email, password) VALUES(:id,:email,:password);";
	}
	*/
}
?>
