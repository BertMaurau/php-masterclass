<?php

$I = new AcceptanceTester($scenario);
$I -> wantTo('check if index (startup) works');
$I -> amOnPage('/');
$I -> see('Congratulations!');
