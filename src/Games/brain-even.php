<?php

namespace BrainGames\Games\brain\even;

use function BrainGames\Engine\gameEngine;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function getQuestionAndAnswer(): array
{
    $question = rand(1, 100);
    $answer = isEven($question) ? 'yes' : 'no';
    return [$question, $answer];
}

function runGame(): void
{
    $rules = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $buildRoundData = fn() => getQuestionAndAnswer();

    gameEngine($rules, $buildRoundData);
}
