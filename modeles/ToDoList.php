<?php
class ToDoList{
	public string $name;
	public array $tasks;
	public array $users;
	public bool $visibility;
	// Implémenter des task dans une meme ToDoList ?
	function __construct($name,$tasks,$users, $visibility){
		$this->name = $name;
		$this->tasks['tsk'] = $tasks;
		$this->users['usr']=$users;
		$this->visibility=$visibility;
	}
	function displayTasks(){
		foreach($this->tasks as $task){
			echo ('<p contenteditable="true">'.$task->description.'</p>');
		}
	}
}

?>