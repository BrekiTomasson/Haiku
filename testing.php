<?php

include 'vendor/autoload.php';

$app = new \BrekiTomasson\Haiku\App();

$app->builder->makeLineOne();
$app->builder->makeLineTwo();
$app->builder->makeLineThree();
echo $app->builder->lineOne . $app->builder->lineTwo . $app->builder->lineThree . PHP_EOL;
$app->builder->makeLineOne();
$app->builder->makeLineTwo();
$app->builder->makeLineThree();
echo $app->builder->lineOne . $app->builder->lineTwo . $app->builder->lineThree . PHP_EOL;
$app->builder->makeLineOne();
$app->builder->makeLineTwo();
$app->builder->makeLineThree();
echo $app->builder->lineOne . $app->builder->lineTwo . $app->builder->lineThree . PHP_EOL;
$app->builder->makeLineOne();
$app->builder->makeLineTwo();
$app->builder->makeLineThree();
echo $app->builder->lineOne . $app->builder->lineTwo . $app->builder->lineThree . PHP_EOL;
$app->builder->makeLineOne();
$app->builder->makeLineTwo();
$app->builder->makeLineThree();
echo $app->builder->lineOne . $app->builder->lineTwo . $app->builder->lineThree . PHP_EOL;
