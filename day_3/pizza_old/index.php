<?php

//header("Content-Type: text/plain");


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

// Load all files
foreach (glob("classes/*.php") as $filename) {
    require_once $filename;
}

$deepPanHawai = (new CrustDeepPanShop()) -> createPizza("PizzaHawai");

echo json_encode($deepPanHawai -> getIngredients());
echo '<br>';
echo $deepPanHawai -> getName();
echo '<br>';
echo $deepPanHawai -> getCrustType();
echo '<br>';
$deepPanHawai -> prepare();
echo '<br>';
$deepPanHawai -> bake();
echo '<br>';
$deepPanHawai -> box();
echo '<br>';
$deepPanHawai -> cut();
echo '<hr>';


$cheesyBarbecue = (new CrustCheesyShop()) -> createPizza("PizzaBarbecue");

echo json_encode($cheesyBarbecue -> getIngredients());
echo '<br>';
echo $cheesyBarbecue -> getName();
echo '<br>';
echo $cheesyBarbecue -> getCrustType();
echo '<br>';
$cheesyBarbecue -> prepare();
echo '<br>';
$cheesyBarbecue -> bake();
echo '<br>';
$cheesyBarbecue -> box();
echo '<br>';
$cheesyBarbecue -> cut();
echo '<hr>';
