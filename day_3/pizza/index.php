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


//namespace Masterclass\Pizza;
//use Masterclass\Pizza\Shops as Shops;
//use Masterclass\Pizza\Crusts as Crusts;
//use Masterclass\Pizza\Pizza as Pizzas;

require_once __DIR__ . '/classes/shop/CheesyCrustShop.php';
require_once __DIR__ . '/classes/shop/ClassicCrustShop.php';
require_once __DIR__ . '/classes/shop/DeepPanCrustShop.php';

define('CRUST_DEEPPAN', 'Deep Pan');
define('CRUST_CHEESYCRUST', 'Cheesy Crust');
define('CRUST_CLASSIC', 'Classic');

define('PIZZA_BARBEQUE', 'Barbeque');
define('PIZZA_HAWAI', 'Hawai');


foreach (['CheesyCrust', 'ClassicCrust', 'DeepPanCrust'] as $crustTypeShop) {

    // Get a new requested shop-class
    $shopClass = $crustTypeShop . 'Shop';
    $shop = new $shopClass($name = 'MyNameIs-' . uniqid(), $location = 'Gent');

    foreach (['Barbeque', 'Hawai'] as $pizzaType) {

        echo 'Pizza Requested: ' . $pizzaType . ' in Shop: ' . $shopClass . ' \w Name: ' . $shop -> getName() . '<br>';

        $shop -> createPizza($pizzaType) -> producePizza();

        echo 'Pizza Produced: ' . $shop -> getPizza() -> getName() . ' \w CrustType: ' . $shop -> getPizza() -> getCrustType() . '<br><br>';
    }
}