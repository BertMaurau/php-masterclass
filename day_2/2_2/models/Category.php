<?php


class Category {
   private $description;

   public function __construct($properties = [])
   {
       foreach ($properties as $key => $value) {
           if (property_exists($this, $key)) {
               $this -> {$key} = $value;
           }
       }

   }

   public function getDescription()
   {
       return $this -> description;
   }
   public function setDescription($description)
   {
       $this -> description = $description;
       return $this;
   } 
}