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
	
	public function addUser($email,$password):bool{
		$requete = "INSERT INTO User(email, password) VALUES(:email,:password);";
		return $this->conn->executeQuery($requete,array(":email"=>(array($email,PDO::PARAM_STR)),
														":password"=>(array($password,PDO::PARAM_STR))));
		
	}
	
	public function deleteAllUsers(){
		$requete = "DELETE * FROM User;";
		return $this->conn->executeQuery($requete);
	}
}
?>
