<?php

namespace App\Models;

class Task{

   public $description;
   protected $completed;

   // public function __construct($description, $completed=false){
   //   $this->description = $description;
   //   $this->completed = $completed;
   // }

   public function isComplete(){
     return $this->completed;
   }

 }
