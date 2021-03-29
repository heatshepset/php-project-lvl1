<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../../vendor/autoload.php';
require_once('../Engine.php');

line("What number is missing in the progression?");

while ($countTruAnswers < $stopRound) {
    $steps = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    $step = array_rand($steps);
    $progression = [];
    foreach (range($minRand, $maxRand, $steps[$step]) as $number) {
        $progression[] = $number;
    }
    $lenProgression = count($progression);
    $border = floor(($lenProgression - 1) / 2);
    $randShift = rand($minRand, $border);

    $progressionCut = array_slice($progression, $randShift);
    $lenProgressionCut = count($progressionCut);
    $progressionItog = [];
    for ($i = 0; $i < 10; $i++) {
        if ($i === $lenProgressionCut) {
            break;
        }
        $progressionItog[] = $progressionCut[$i];
    }

    $randKeyProgression = rand(0, count($progressionItog));
    $progNumber = $progressionItog[$randKeyProgression];
    $progressionItog[$randKeyProgression] = '..';
    $progressionString = implode(' ', $progressionItog);

    line('Question: ' . $progressionString);
    $answer = prompt('Your answer');

    if ($progNumber === ((int) $answer)) {
        line('Correct!');
        $countTruAnswers++;
    } else {
        line("'" . $answer . "' is wrong answer ;(. Correct answer was '" . $progNumber . "'.");
        line("Let's try again, " . $name . "!");
    }
}

if ($countTruAnswers === $stopRound) {
    line("Congratulations, " . $name . "!");
}
