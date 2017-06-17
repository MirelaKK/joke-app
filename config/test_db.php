<?php
$db = require(__DIR__ . '/db.php');
$db1 = require(__DIR__ . '/db1.php');
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=localhost;dbname=yii2_vicevi_tests';

return $db;