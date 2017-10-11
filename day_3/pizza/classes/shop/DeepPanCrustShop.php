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

require_once __DIR__ . '/../Shop.php';

/**
 * Description of DeepPanCrustShop
 *
 * @author bertmaurau
 */
class DeepPanCrustShop extends Shop
{

    public function __construct($name, $location)
    {
        parent::__construct($name, $location);
    }

    /**
     * Generate the Pizza
     * @param string $crustType
     * @return Pizza
     */
    public function createPizza($pizzaType)
    {
        switch ($pizzaType) {
            case PIZZA_BARBEQUE:
                require_once __DIR__ . '/../pizza/BarbequeDeepPan.php';
                parent::setPizza(new BarbequeDeepPan());
                return $this;
                break;
            case PIZZA_HAWAI:
                require_once __DIR__ . '/../pizza/HawaiDeepPan.php';
                parent::setPizza(new HawaiDeepPan());
                return $this;
                break;
        }
    }

}
