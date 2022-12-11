<?php
class ToDoList{
	public int $id;
	public string $name;
	public array $tasks;
	public User $users;
	public bool $visibility;
	// Implémenter des task dans une meme ToDoList ?
	function __construct($id,$name,$tasks,$user, $visibility){
		$this->id = $id;
		$this->name = $name;
		$this->tasks = $tasks;
		$this->user=$user;
		$this->visibility=$visibility;
	}
	function displayTasks(){
		foreach($this->tasks as $task){
			echo ('<p contenteditable="true">'.$task->description.'</p>');
		}
	}
}

?>