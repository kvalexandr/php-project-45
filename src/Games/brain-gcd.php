<?php

namespace BrainGames\Games\brain\gcd;

function getQuestionAndAnswer(): array
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);

    $question = "{$number1} {$number2}";
    $answer = gmp_gcd($number1, $number2);

    return [$question, (string)$answer];
}

function getData()
{
    return [
        'rules' => "Find the greatest common divisor of given numbers.",
        'getQuestionAndAnswer' => function () {
            return getQuestionAndAnswer();
        }
    ];
}
