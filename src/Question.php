<?php

namespace App;

class Question
{
    protected string $question;
    protected int $solution;

    protected bool $result;

    public function __construct($question, $solution)
    {
        $this->question = $question;
        $this->solution = $solution;
    }

    public function answer($response)
    {
        $this->result = ($response === $this->solution);
    }

    public function solved()
    {
        return $this->result;
    }
}
