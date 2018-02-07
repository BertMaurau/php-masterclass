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

    public function getName()
    {
        return $this -> name;
    }

    public function getLocation()
    {
        return $this -> location;
    }

    public function setName($name)
    {
        $this -> name = $name;
        return $this;
    }

    public function setLocation($location)
    {
        $this -> location = $location;
        return $this;
    }

    public abstract function createPizza($pizzaName);
}
