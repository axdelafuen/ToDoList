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
		$user['isAdmin'] = ' ';
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
			$user['isAdmin']=$data['isadmin'];
		}
		return $user;
		
	}
	
	public function addUser($email,$password):bool{
		$requete = "INSERT INTO User(email, password, isadmin) VALUES(:email,:password, :admin);";
		return $this->conn->executeQuery($requete,array(":email"=>(array($email,PDO::PARAM_STR)),
														":password"=>(array($password,PDO::PARAM_STR)),
														":admin"=>(array(false,PDO::PARAM_BOOL))));
		
	}
	
	public function addAdmin($email,$password):bool{
		$requete = "INSERT INTO User(email, password, isadmin) VALUES(:email,:password, :admin);";
		return $this->conn->executeQuery($requete,array(":email"=>(array($email,PDO::PARAM_STR)),
														":password"=>(array($password,PDO::PARAM_STR)),
														":admin"=>(array(true,PDO::PARAM_BOOL))));
		
	}
	
	public function deleteAllUsers(){
		$requete = "DELETE * FROM User;";
		return $this->conn->executeQuery($requete);
	}
}
?>
