<?php

include __DIR__ . '/../../vendor/autoload.php';

$app = new \Framework\Http();

$app->router();

return $app;