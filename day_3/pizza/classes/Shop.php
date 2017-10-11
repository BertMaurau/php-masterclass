<?php

/*
 * Copyright 2017 bertmaurau.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Description of Shop
 *
 * @author bertmaurau
 */
abstract class Shop
{

    private $name;
    private $location;
    private $pizza;
    protected $crustType;

    public function __construct($name, $location)
    {
        $this -> setName($name);
        $this -> setLocation($location);
    }

    /**
     * Get Name
     * @return string
     */
    public function getName()
    {
        return $this -> name;
    }

    /**
     * Set Name
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this -> name = $name;
        return $this;
    }

    /**
     * Get Location
     * @return string
     */
    public function getLocation()
    {
        return $this -> location;
    }

    /**
     * Set Location
     * @param string $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this -> location = $location;
        return $this;
    }

    /**
     * Get CrustType
     * @return string
     */
    public function getType()
    {
        return $this -> type;
    }

    /**
     * Get Pizza
     * @return Pizza
     */
    public function getPizza()
    {
        return $this -> pizza;
    }

    public function setPizza($pizza)
    {
        $this -> pizza = $pizza;
        return $this;
    }

    /**
     * Execute all steps to produce a pizza
     * @param string $pizzaType
     * @return Pizza
     */
    public function producePizza()
    {
        foreach (['prepare', 'bake', 'cut', 'box'] as $action) {
            echo '(action)' . $action . ' : ' . $this -> pizza -> {$action}() . '<br>';
        }
    }

    /**
     * Create Pizza
     * @param  string $pizzaType
     * @return Pizza
     */
    abstract public function createPizza($pizzaType);
}
