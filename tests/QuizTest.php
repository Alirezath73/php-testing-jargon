<?php

use App\Question;
use App\Quiz;
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
    private $quiz;

    public function setUp() : void
    {
        $this->quiz = new Quiz;
    }

    /** @test */
    public function it_returns_count_of_questions()
    {
        $this->quiz->addQuestion(new Question('what is 2 + 2', 4));

        $this->assertCount(1, $this->quiz->questions());
    }

    /** @test */
    public function it_returns_grade_of_quiz_is_passed()
    {
        $this->quiz->addQuestion(new Question('what is 2 + 2', 4));

        $question = $this->quiz->nextQuestion();

        $question->answer(4);

        $this->assertEquals(100, $this->quiz->grade());
    }

    /** @test */
    public function it_returns_grade_of_quiz_is_failed()
    {
        $this->quiz->addQuestion(new Question('what is 2 + 2', 4));

        $question = $this->quiz->nextQuestion();

        $question->answer(2);

        $this->assertEquals(0, $this->quiz->grade());
    }
}
