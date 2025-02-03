<?php

namespace BrainGames\Games\brain\even;

function isEven($number): bool
{
    return $number % 2 === 0;
}

function getQuestionAndAnswer(): array
{
    $question = rand(1, 100);
    $answer = isEven($question) ? 'yes' : 'no';
    return [$question, $answer];
}

function getData()
{
    return [
        'rules' => "Answer \"yes\" if the number is even, otherwise answer \"no\".",
        'getQuestionAndAnswer' => function () {
            return getQuestionAndAnswer();
        }
    ];
}
