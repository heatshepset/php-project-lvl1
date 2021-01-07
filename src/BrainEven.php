<?php

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../vendor/autoload.php';

line("Welcome to the Brain Game!");
$name = prompt('May I have your name?');
line('Hello, %s!', $name);
line('Answer \"yes\" if the number is even, otherwise answer \"no\".');

$countTruAnswers = 0;
$minRand = 0;
$maxRand = 100;

while ($countTruAnswers < 3) {
    $randNumber = rand($minRand, $maxRand);
    line('Question: ' . $randNumber);
    $answer = prompt('');
    line('Your answer: ' . $answer);

    if ($randNumber % 2 === 0) {
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

if ($countTruAnswers === 3) {
    line("Congratulations, " . $name . "!");
}
