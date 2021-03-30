<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

require __DIR__ . '/../../vendor/autoload.php';

line("Welcome to the Brain Game!");
$name = prompt('May I have your name?');
line('Hello, %s!', $name);

line("What number is missing in the progression?");

$countTruAnswers = 0;
$stopRound = 3;
$minRand = 1;
$maxRand = 100;
while ($countTruAnswers < $stopRound) {
    $steps = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    $step = array_rand($steps);
    $progression = [];
    foreach (range($minRand, $maxRand, $steps[$step]) as $number) {
        $progression[] = $number;
    }
    $lenProgression = count($progression);
    $border = floor(($lenProgression - 1) / 2);
    $randShift = rand($minRand, (int) $border);

    $progressionCut = array_slice($progression, $randShift);
    $lenProgressionCut = count($progressionCut);
    $progressionItog = [];
    for ($i = 0; $i < 10; $i++) {
        if ($i === $lenProgressionCut) {
            break;
        }
        $progressionItog[] = $progressionCut[$i];
    }
    $randMaxIndex = count($progressionItog) - 1;
    $randKeyProgression = rand(0, $randMaxIndex);
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
        break;
    }
}

if ($countTruAnswers === $stopRound) {
    line("Congratulations, " . $name . "!");
}
