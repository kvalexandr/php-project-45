<?php

namespace BrainGames\Games\brain\progression;

use function BrainGames\Engine\gameEngine;

function getQuestionAndAnswer(): array
{
    $lenProgression = rand(5, 10);
    $positionHide = rand(1, $lenProgression);
    $startProgression = rand(5, 40);
    $stepProgression = rand(2, 5);

    $question = [];
    $answer = '';
    for ($i = 0; $i < $lenProgression; $i++) {
        $numberProgression = $startProgression + $stepProgression * $i;
        if ($positionHide === $i + 1) {
            $question[] = '..';
            $answer = $numberProgression;
        } else {
            $question[] = $numberProgression;
        }
    }

    return [implode(' ', $question), (string)$answer];
}

function runGame(): void
{
    $rules = "What number is missing in the progression?";
    $getDataGame = fn() => getQuestionAndAnswer();

    gameEngine($rules, $getDataGame);
}
