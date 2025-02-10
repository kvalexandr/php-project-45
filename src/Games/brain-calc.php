<?php

namespace BrainGames\Games\brain\calc;

use function BrainGames\Engine\gameEngine;

function calc(int $number1, int $number2, string $operator): string
{
    return match ($operator) {
        '+' => $number1 + $number2,
        '-' => $number1 - $number2,
        '*' => $number1 * $number2,
        default => throw new \Exception("Unknown operator: {$operator}"),
    };
}

function getQuestionAndAnswer(): array
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    $operators = ['+', '-', '*'];
    $operator = $operators[array_rand($operators)];

    $answer = calc($number1, $number2, $operator);
    $question = "{$number1} {$operator} {$number2}";

    return [$question, $answer];
}

function runGame(): void
{
    $rules = "What is the result of the expression?";
    $buildRoundData = fn() => getQuestionAndAnswer();

    gameEngine($rules, $buildRoundData);
}
