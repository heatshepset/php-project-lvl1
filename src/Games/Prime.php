<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../../vendor/autoload.php';

line("Welcome to the Brain Game!");
$name = prompt('May I have your name?');
line('Hello, %s!', $name);

line('Answer "yes" if given number is prime. Otherwise answer "no".');

$countTruAnswers = 0;
$stopRound = 3;
$minRand = 1;
$maxRand = 100;
while ($countTruAnswers < $stopRound) {
    $randNumber = rand($minRand, $maxRand);
    line('Question: ' . $randNumber);
    $answer = prompt('Your answer');
    $gsd = [];
    $i = 2;
    while ($i <= $randNumber) {
        if ($randNumber % $i === 0) {
            $gsd[] = $i;
        }
        $i++;
    }

    if (count($gsd) === 1) {
        if ($answer === 'yes') {
            line('Correct!');
            $countTruAnswers++;
        } else {
            line("'" . $answer . "' is wrong answer ;(. Correct answer was 'yes'.");
            line("Let's try again, " . $name . "!");
            break;
        }
    } else {
        if ($answer === 'no') {
            line('Correct!');
            $countTruAnswers++;
        } else {
            line("'" . $answer . "' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, " . $name . "!");
            break;
        }
    }
}

if ($countTruAnswers === $stopRound) {
    line("Congratulations, " . $name . "!");
}
