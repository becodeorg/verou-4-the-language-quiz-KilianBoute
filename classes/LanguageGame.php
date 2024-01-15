<?php

class LanguageGame
{
    private array $words;
    private Word $currentWord;
    private Player $player;

    public function __construct()
    {
        $this->words = [];
        // :: is used for static functions
        // They can be called without an instance of that class being created
        // and are used mostly for more *static* types of data (a fixed set of translations in this case)
        foreach (Data::words() as $frenchTranslation => $englishTranslation) {
            // TODO: create instances of the Word class to be added to the words array
            $this->words[] = new Word($frenchTranslation, $englishTranslation);
        }
    }

    public function getRandomWord()
    {
        return $this->words[rand(0, count($this->words) - 1)];
    }

    public function updateWord()
    {
        $this->currentWord = $this->getRandomWord();
        $_SESSION['currentWord'] = $this->currentWord;
    }

    public function run(): void
    {
        session_start();

        // Option A: user visits site first time (or wants a new word)
        if (empty($_SESSION['player'])) {
            $this->player = new Player('player1');
            $_SESSION['player'] = $this->player;
        } else {
            $this->player = $_SESSION['player'];
        }

        if (empty($_SESSION["currentWord"]) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->updateWord();
            unset($_SESSION['message']);
        } else {
            if (!empty($_POST['reset'])) {
                $this->player->resetScore();
                $_SESSION['message'] = "Reset";
            } else {
                // Option B: user has just submitted an answer
                $this->currentWord = $_SESSION['currentWord'];
                $answer = htmlspecialchars($_POST['answer']);
                $isCorrect = $this->currentWord->verify($answer);
                if ($isCorrect) {
                    $this->player->increaseScore();
                    $_SESSION['message'] = 'Correct';
                } else {
                    $this->player->decreaseScore();
                    $_SESSION['message'] = 'Nope';
                }
            }
            // Update the word after handling the answer
            $this->updateWord();
            $_SESSION['player'] = $this->player;
        }
        session_write_close();
    }
}
