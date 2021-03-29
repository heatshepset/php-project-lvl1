<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../../vendor/autoload.php';
require dirname(__DIR__) . '/Engine.php';

line('What is the result of the expression?');
$mathematicalOperation = ['+', '-', '*'];

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
