<?php

class Player
{
    // TODO: add name and score
    private $name;
    private $score, $scoreCorrect, $scoreWrong;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->score = $this->scoreCorrect = $this->scoreWrong = 0;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function increaseScore()
    {
        $this->score++;
        $this->scoreCorrect++;
    }

    public function decreaseScore()
    {
        if ($this->score > 0) {
            $this->score--;
        }
        $this->scoreWrong++;
    }

    public function getScoreCorrect()
    {
        return $this->scoreCorrect;
    }

    public function getScoreWrong()
    {
        return $this->scoreWrong;
    }

    public function resetScore()
    {
        $this->score = 0;
        $this->scoreCorrect = 0;
        $this->scoreWrong = 0;
    }
}
