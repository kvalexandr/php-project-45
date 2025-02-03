<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_ROUND = 3;

function startGame($data): void
{
    ['rules' => $rules, 'getQuestionAndAnswer' => $getQuestionAndAnswer] = $data;

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rules);

    for ($i = 0; $i < COUNT_ROUND; $i++) {
        [$question, $answer] = $getQuestionAndAnswer();
        line("Question: %s", $question);
        $answerUser = prompt('Your answer');

        if ($answerUser !== $answer) {
            line("'{$answerUser}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $name);
}
