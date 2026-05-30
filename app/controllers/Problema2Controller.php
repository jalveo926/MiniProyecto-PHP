<?php

use App\Utils\Matematica;
use App\Utils\Navigation;
$total = Matematica::sumarRango(1, 1000);  // 500500
include __DIR__ . '/../views/problema2.php';
?>