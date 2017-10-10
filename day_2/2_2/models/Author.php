<?php


class Author {
   private $name;

   public function __construct($properties = [])
   {
       foreach ($properties as $key => $value) {
           if (property_exists($this, $key)) {
               $this -> {$key} = $value;
           }
       }

   }

   public function getName()
   {
       return $this -> name;
   }
   public function setName($name)
   {
       $this -> name = $name;
       return $this;
   } 
}