<?php

namespace BrainGames\Games\brain\gcd;

use function BrainGames\Engine\gameEngine;

function gcd(int $num1, int $num2): string
{
    $maxNum = max($num1, $num2);
    $minNum = min($num1, $num2);

    for ($i = $minNum; $i > 0; $i--) {
        if ($maxNum % $i === 0 && $minNum % $i === 0) {
            return (string)$i;
        }
    }

    return '0';
}

function getQuestionAndAnswer(): array
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);

    $question = "{$number1} {$number2}";
    $answer = gcd($number1, $number2);

    return [$question, $answer];
}

function runGame(): void
{
    $rules = "Find the greatest common divisor of given numbers.";
    $buildRoundData = fn() => getQuestionAndAnswer();

    gameEngine($rules, $buildRoundData);
}
