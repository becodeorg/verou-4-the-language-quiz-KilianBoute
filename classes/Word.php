<?php

class Word
{
    // TODO: add word (FR) and answer (EN) - (via constructor or not? why?)

    private $frenchTranslation, $englishTranslation;

    public function __construct(string $frenchTranslation, string $englishTranslation)
    {
        $this->frenchTranslation = $frenchTranslation;
        $this->englishTranslation = $englishTranslation;
    }

    public function verify(string $answer): bool
    {
        // TODO: use this function to verify if the provided answer by the user matches the correct one
        // Bonus: allow answers with different casing (example: both bread or Bread can be correct answers, even though technically it's a different string)
        // Bonus (hard): can you allow answers with small typo's (max one character different)?

        return $answer === $this->frenchTranslation;
    }

    public function getEnglishTranslation()
    {
        return $this->englishTranslation;
    }

    public function getFrenchTranslation()
    {
        return $this->frenchTranslation;
    }
}
