<?php


class Article {
   private $title;
   private $category;
   private $description;
   private $author;

   public function __construct($properties = [])
   {
       foreach ($properties as $key => $value) {
           if (property_exists($this, $key)) {
               $this -> {$key} = $value;
           }
       }

   }

   public function getTitle()
   {
       return $this -> title;
   }
   public function setTitle($title)
   {
       $this -> title = $title;
       return $this;
   }

   public function getCategory()
   {
       return $this -> category;
   }
   public function setCategory(Category $category)
   {
       $this -> category = $category;
       return $this;
   }

   public function getAuthor()
   {
       return $this -> author;
   }
   public function setAuthor(Author $author)
   {
       $this -> author = $author;
       return $this;
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