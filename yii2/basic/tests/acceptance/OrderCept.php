<?php

require_once __DIR__ . '/../_support/Step/Acceptance/OrderOperatorSteps.php';
$I = new Step\Acceptance\OrderOperatorSteps($scenario);

$I -> wantTo('add a new order to the database');
$I -> amInAddOrderUi();

// Correct Order
// -----------------
// generate a new order
$order = $I -> mockOrder();

$I -> fillOrderForm($order);
$I -> submitOrderForm();
$I -> validateOrderCreation($order);
$I -> checkId($order);

// Incorrect Order
// -----------------
$I = new Step\Acceptance\OrderOperatorSteps($scenario);
$I -> wantTo('try to add a BAD order to the database');

$I -> amInAddOrderUi();

// generate a new order
$order = $I -> mockBadOrder();

$I -> fillOrderForm($order);
$I -> submitOrderForm();
$I -> validateOrderCreation($order);
$I -> checkMissingId($order);
