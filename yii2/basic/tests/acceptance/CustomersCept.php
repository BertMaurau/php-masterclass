<?php

$I = new AcceptanceTester($scenario);
$I -> wantTo('open Customer with ID 1 and check for results');
$I -> amOnPage('customer/view?id=1');
$I -> see('Maurau');
