<?php

namespace BrainGames\Games\brain\calc;

use function BrainGames\Engine\gameEngine;

function getQuestionAndAnswer(): array
{
    $answer = '';
    $operator = '';
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);

    switch (rand(0, 2)) {
        case 0:
            $operator = '+';
            $answer = $number1 + $number2;
            break;
        case 1:
            $operator = '-';
            $answer = $number1 - $number2;
            break;
        case 2:
            $operator = '*';
            $answer = $number1 * $number2;
            break;
    }

    $question = "{$number1} {$operator} {$number2}";

    return [$question, (string)$answer];
}

function runGame(): void
{
    $rules = "What is the result of the expression?";
    $getDataGame = fn() => getQuestionAndAnswer();

    gameEngine($rules, $getDataGame);
}
