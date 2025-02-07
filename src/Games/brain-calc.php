<?php

namespace BrainGames\Games\brain\calc;

use function BrainGames\Engine\gameEngine;

/**
 * @throws \Exception
 */
function getQuestionAndAnswer(): array
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    $operators = ['+', '-', '*'];
    $operator = $operators[array_rand($operators)];

    switch ($operator) {
        case '+':
        default:
            $answer = $number1 + $number2;
            break;
        case '-':
            $answer = $number1 - $number2;
            break;
        case '*':
            $answer = $number1 * $number2;
            break;
    }

    $question = "{$number1} {$operator} {$number2}";

    return [$question, (string)$answer];
}

function runGame(): void
{
    $rules = "What is the result of the expression?";
    $buildRoundData = fn() => getQuestionAndAnswer();

    gameEngine($rules, $buildRoundData);
}
