<?php
class CompteGateway
{
	// Attributs
	private $conn;

	// Constructeur
	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function inscription(string $email, string $password) : bool
	{
		$requette = "INSERT INTO _User(id, email, password) VALUES(:id, :email, :password);";
		return $this->conn->executeQuery($requette, array(
			":id" => [$id, PDO::PARAM_INT],
			":email" => [$email, PDO::PARAM_STR],
			":password" => [$password, PDO::PARAM_STR]
		));
	}
	public function getUsers():?array{
		$requete = "SELECT id, name FROM User;";
		if(!$this->conn->executeQuery($requete))
		{
			return array();
		}
		$usersDATA = $this->conn->getResults();
		$users = array();
		if(sizeof($usersDATA)!=0){
			while($usersDATA = mysql_fetch_assoc($usersDATA)){
				$users['name'] = $userDATA['name'];
				$users['password'] = $userDATA['password'];
			}
		}
		return array();
	}
		
	}
	/*
	public function getCompteParPseudo(string $pseudo) : ?Compte
	{
		$gw = new ListeGateway($this->conn);
		$requete = "SELECT * FROM _Compte WHERE pseudonyme=:pseudo";
		if(!$this->conn->executeQuery($requete, [":pseudo" => [$pseudo, PDO::PARAM_STR]]))
		{
			return array();
		}
		$comptesSQL = $this->conn->getResults();
		if(sizeof($comptesSQL) != 0)
		{
			$compte = new Compte(
				$comptesSQL[0]["pseudonyme"],
				$comptesSQL[0]["dateCreation"],
				$gw->getListeParCreateur(1, 10, $comptesSQL[0]["pseudonyme"]),
				$comptesSQL[0]["motDePasse"],
			);
			return $compte;
		}
		return null;
	}
	*/
}
?>
