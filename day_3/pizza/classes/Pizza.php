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

    protected $name;
    protected $crustType;

    /**
     * Get Pizza name
     * @return string
     */
    public function getName()
    {
        return $this -> name;
    }

    public function setName($name)
    {
        $this -> name = $name;
        return $this;
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

    public function prepare()
    {
        return 'Preparing..';
    }

    public abstract function bake();

    public function cut()
    {
        return 'Cutting..';
    }

    public function box()
    {
        return 'Boxing..';
    }

}
