<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function gameEngine(string $rules, callable $buildRoundData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rules);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $answer] = $buildRoundData();
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
