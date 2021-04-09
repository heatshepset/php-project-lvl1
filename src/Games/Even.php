<?php
/**
 * Игра на определение четности числа
 */
namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../../vendor/autoload.php';

line("Welcome to the Brain Game!");
$name = prompt('May I have your name?');
line('Hello, %s!', $name);

line('Answer \"yes\" if the number is even, otherwise answer \"no\".');

$countTruAnswers = 0;
$stopRound = 3;
$minRand = 1;
$maxRand = 100;
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
