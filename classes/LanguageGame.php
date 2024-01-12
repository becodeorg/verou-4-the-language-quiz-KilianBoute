<?php

class LanguageGame
{
    private array $words;
    private Word $currentWord;

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

    public function run(): void
    {
        // TODO: check for option A or B
        session_start();
        // Option A: user visits site first time (or wants a new word)
        // TODO: select a random word for the user to translate
        if (empty($_SESSION["currentWord"]) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->currentWord = $this->getRandomWord();
            $_SESSION['currentWord'] = $this->currentWord;
            unset($_SESSION['message']);
        }
        // Option B: user has just submitted an answer
        else {
            $this->currentWord = $_SESSION['currentWord'];
            $answer = htmlspecialchars($_POST['answer']);
            $isCorrect = $this->currentWord->verify($answer);
            if ($isCorrect) {
                $_SESSION['message'] = 'Correct';
                $this->currentWord = $this->getRandomWord();
                $_SESSION['currentWord'] = $this->currentWord;
            } else {
                $_SESSION['message'] = 'Nope';
            }
        }
        // TODO: verify the answer (use the verify function in the word class) - you'll need to get the used word from the array first
        // TODO: generate a message for the user that can be shown

    }
}
