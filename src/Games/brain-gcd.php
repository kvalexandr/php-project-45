<?php

namespace BrainGames\Games\brain\gcd;

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

function getData()
{
    return [
        'rules' => "Find the greatest common divisor of given numbers.",
        'getQuestionAndAnswer' => function () {
            return getQuestionAndAnswer();
        }
    ];
}
