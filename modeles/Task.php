<?php

class Task{
    public int $id;
    public int $priorite;
    public bool $done;
    public string $description;
    public 
    function __construct($id,$priorite,$done,$description){
        $this->description=$description;
        $this->id=$id;
        $this->priorite=$priorite;
        $this->done=$done;
    }
}
?>