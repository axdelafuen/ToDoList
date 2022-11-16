<?php
class ToDoList{
	private string $name;
	private array $tasks;
	private array $users;
	private bool $visibility;
	// Implémenter des task dans une meme ToDoList ?
	function __construct($name, $tasks, $users, $visibility){
		$this->name = $name;
		$this->tasks = $tasks;
		$this->users=$users;
		$this->visibility=$visibility;
	}
}

?>