<?php

namespace BrainGames\Games\brain\progression;

use function BrainGames\Engine\gameEngine;

function getProgression(int $len, int $start, int $step): array
{
    $progression = [];
    for ($i = 0; $i < $len; $i++) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}

function getQuestionAndAnswer(): array
{
    $lenProgression = rand(5, 10);
    $positionHide = rand(1, $lenProgression);
    $startProgression = rand(5, 40);
    $stepProgression = rand(2, 5);

    $progression = getProgression($lenProgression, $startProgression, $stepProgression);
    $answer = $progression[$positionHide + 1];
    $progression[$positionHide + 1] = '..';
    $question = $progression;

    return [implode(' ', $question), (string)$answer];
}

function runGame(): void
{
    $rules = "What number is missing in the progression?";
    $buildRoundData = fn() => getQuestionAndAnswer();

    gameEngine($rules, $buildRoundData);
}
