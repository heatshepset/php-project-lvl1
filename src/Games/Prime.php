<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../../vendor/autoload.php';
require dirname(__DIR__) . '/Engine.php';

line('Answer "yes" if given number is prime. Otherwise answer "no".');

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
        }
    } else {
        if ($answer === 'no') {
            line('Correct!');
            $countTruAnswers++;
        } else {
            line("'" . $answer . "' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, " . $name . "!");
        }
    }
}

if ($countTruAnswers === $stopRound) {
    line("Congratulations, " . $name . "!");
}
