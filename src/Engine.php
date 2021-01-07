<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../vendor/autoload.php';

line("Welcome to the Brain Game!");
$name = prompt('May I have your name?');
line('Hello, %s!', $name);

$countTruAnswers = 0;
$stopRound = 3;
$minRand = 0;
$maxRand = 60;
