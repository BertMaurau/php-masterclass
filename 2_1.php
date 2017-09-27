<?php

header('HTTP/1.1 200 OK');
header('Content-Type: text/plain; charset=utf-8');


echo $Article = (new Article(array(
    "name" => "My Article", 
    "price" => 20, 
    "description" => "My first article!"))) -> exportText();

class Exporter
{
    public function exportCSV()
    {
        // Export here
        foreach ($this -> getObject() as $key => $value) {
            echo "$key => $value\n";
        }
    }
    public function exportJSON()
    {
        // Export here
        return json_encode($this -> getObject(), JSON_NUMERIC_CHECK);
    }
    public function exportText()
    {
        // Export here
        foreach ($this->getObject() as $key => $value) {
            echo "$key: $value\n";
        }
    }
}

class Article extends Exporter
{
    private $name;
    private $price;
    private $description;

    public function __construct($properties)
    {
        foreach ($properties as $key => $value) {
            if (property_exists($this, $key)) {
                $this -> {$key} = $value;
            }
        }

    }

    public function getObject()
    {
       // Return allowd vars
        return array(
          "name" => $this -> getName(),
          "price" => $this -> getPrice(),
          "description" => $this -> getDescription());
    }

    public function getName()
    {
        return $this -> name;
    }
    public function setName($name)
    {
        $this -> name = $name;
    }

    public function getPrice()
    {
        return $this -> price;
    }
    public function setPrice($price)
    {
        $this -> price = $price;
    }

    public function getDescription()
    {
        return $this -> description;
    }
    public function setDescription($description)
    {
        $this -> description = $description;
    }
}
