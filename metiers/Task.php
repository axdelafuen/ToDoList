<?php

class Task{
    public int $id;
    public int $priorities;
    public bool $done;
    public string $description;

    function __construct($id,$priorite,$done,$description){
        $this->description=$description;
        $this->id=$id;
        $this->priorities=$priorite;
        $this->done=$done;
    }
}
?>