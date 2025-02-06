<?php

namespace BrainGames\Games\brain\prime;

use function BrainGames\Engine\gameEngine;

function isPrime(int $number): bool
{
    if ($number === 1) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function getQuestionAndAnswer(): array
{
    $number = rand(1, 100);

    $question = $number;
    $answer = isPrime($number) ? 'yes' : 'no';

    return [$question, $answer];
}

function runGame(): void
{
    $rules = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $getDataGame = fn() => getQuestionAndAnswer();

    gameEngine($rules, $getDataGame);
}
