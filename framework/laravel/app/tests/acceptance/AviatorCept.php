<?php 

$I = new AcceptanceTester($scenario);
$I->wantTo('Make sure all the blueprints are shown');
$I->amOnPage('/');
$I->see('All The Blueprints');