<?php

/**
 * Игра - подсчитай арифметическое выражение
 */

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../../vendor/autoload.php';

line("Welcome to the Brain Game!");
$name = prompt('May I have your name?');
line('Hello, %s!', $name);

line('What is the result of the expression?');
$mathematicalOperation = ['+', '-', '*'];

$countTruAnswers = 0;
$stopRound = 3;
$minRand = 1;
$maxRand = 100;
while ($countTruAnswers < $stopRound) {
    $randNumber1 = rand($minRand, $maxRand);
    $randNumber2 = rand($minRand, $maxRand);
    $randOperation = array_rand($mathematicalOperation);
    line('Question: ' . $randNumber1 . ' ' . $mathematicalOperation[$randOperation] . ' ' . $randNumber2);
    $answer = prompt('Your answer');
    $mathString = "{$randNumber1}{$mathematicalOperation[$randOperation]}{$randNumber2}";
    $resultOperation = eval('return ' . $mathString . ';');

    if (((int) $resultOperation) === ((int) $answer)) {
        line('Correct!');
        $countTruAnswers++;
    } else {
        line("'" . $answer . "' is wrong answer ;(. Correct answer was '" . $resultOperation . "'.");
        line("Let's try again, " . $name . "!");
        break;
    }
}

if ($countTruAnswers === $stopRound) {
    line("Congratulations, " . $name . "!");
}
