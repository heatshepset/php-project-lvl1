<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../../vendor/autoload.php';
require dirname(__DIR__) . '/Engine.php';

line("Find the greatest common divisor of given numbers.");

while ($countTruAnswers < $stopRound) {
    $randNumber1 = rand($minRand, $maxRand);
    $randNumber2 = rand($minRand, $maxRand);
    line('Question: ' . $randNumber1 . ' ' . $randNumber2);
    $answer = prompt('Your answer');

    $gcd = 1;
    if ($randNumber1 !== $randNumber2) {
        $maxNumber = max($randNumber1, $randNumber2);
        $lineStop = $maxNumber / 2;

        $i = 1;
        while ($i < $lineStop) {
            if ($randNumber1 % $i === 0 && $randNumber2 % $i === 0) {
                $gcd = $i;
            }
            $i++;
        }
    } else {
        $gcd = $randNumber1;
    }

    if ($gcd === ((int) $answer)) {
        line('Correct!');
        $countTruAnswers++;
    } else {
        line("'" . $answer . "' is wrong answer ;(. Correct answer was '" . $gcd . "'.");
        line("Let's try again, " . $name . "!");
        break;
    }
}

if ($countTruAnswers === $stopRound) {
    line("Congratulations, " . $name . "!");
}
