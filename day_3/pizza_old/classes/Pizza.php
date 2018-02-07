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
 * Description of Pizza
 *
 * @author bertmaurau
 */
abstract class Pizza
{

    const PIZZA_NAME = "";

    private $crustType;
    private $ingredients = [];

    /**
     * Add ingredient to the list
     * @param string $ingredients
     * @return $this
     */
    public function addIngredients($ingredients)
    {
        foreach ($ingredients as $ingredient) {
            if (!in_array($ingredient, $this -> ingredients, true)) {
                array_push($this -> ingredients, $ingredient);
            }
        }
        return $this;
    }

    /**
     * Get the current ingredients
     * @return array
     */
    public function getIngredients()
    {
        return $this -> ingredients;
    }

    /**
     * Get the name of the pizza
     * @return string
     */
    public function getName()
    {
        return static::PIZZA_NAME;
    }

    public function getCrustType()
    {
        return $this -> crustType;
    }

    public function setCrustType($crustType)
    {
        $this -> crustType = $crustType;
        return $this;
    }

    public abstract function bake();

    public function prepare()
    {
        echo "Preparing.. \n";
    }

    public function box()
    {
        echo "Boxing..\n";
    }

    public function cut()
    {
        echo "Cutting..\n";
    }

}
