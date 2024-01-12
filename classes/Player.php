<?php

class Player
{
    // TODO: add name and score
    private $name;
    private $score;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->score = 0;
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
    }

    public function decreaseScore()
    {
        $this->score--;
    }
}
