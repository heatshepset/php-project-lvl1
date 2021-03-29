<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../../vendor/autoload.php';
require dirname(__DIR__) . '/Engine.php';

line('Answer \"yes\" if the number is even, otherwise answer \"no\".');

while ($countTruAnswers < $stopRound) {
    $randNumber = rand($minRand, $maxRand);
    line('Question: ' . $randNumber);
    $answer = prompt('Your answer');

    if ($randNumber % 2 === 0) {
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
