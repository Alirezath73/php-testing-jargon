<?php

namespace App;

use App\Question;

class Quiz
{
    protected array $questions;

    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function questions()
    {
        return $this->questions;
    }

    public function nextQuestion()
    {
        return $this->questions[0];
    }

    public function grade()
    {
        return (count($this->correctQuestions()) / count($this->questions)) * 100;
    }

    private function correctQuestions()
    {
        return array_filter(
            $this->questions,
            fn ($question) => $question->solved()
        );
    }
}
