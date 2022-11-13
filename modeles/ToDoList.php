<?php

require('User.php');

class ToDoList{
	private $name;
	private $content;
	private User $user;
	
	function _construct($name, $content){
		$this->name = $name;
		$this->conent = $content;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	public function getUser(){
		return $this->user->getEmail();
	}
}

?>