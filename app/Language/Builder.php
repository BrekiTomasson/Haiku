<?php

namespace BrekiTomasson\Haiku\Language;

use BrekiTomasson\Haiku\Language\WordTypes\Adjective;
use BrekiTomasson\Haiku\Language\WordTypes\Noun;
use BrekiTomasson\Haiku\Language\WordTypes\Verb;
use Exception;
use phpDocumentor\Reflection\Types\Void_;

class Builder {

    public $lineOne;
    public $lineTwo;
    public $lineThree;

    public $subject = 'it';

    public $wordCategories = ['Adjective', 'Noun', 'Verb'];

    /**
     * @throws Exception
     */
    public function makeLineOne() : void
    {
        $line = 1;
        $words = [];

        if ($this->likeliness(45)) {
            $words[] = $this->getRandomArticle();
        }

        if ($this->likeliness(95)) {
            $adjectiveLength = [1, 2, 3, 4];

            if (count($words) >= 1) {
                $adjectiveLength = [1, 2, 3];
            }

            $words[] = $this->makeAdjective([1, 2, 3, 4]);
        }

        $syllablesRemaining = $this->remainingSyllables($line,
            $this->countSyllables($words));

        if ($syllablesRemaining !== 0) {
            $words[] = $this->makeNoun([$syllablesRemaining]);
        }

        $this->lineOne = $this->makeString($words) . PHP_EOL;

    }

    public function makeLineTwo() : void
    {
        $line = 2;
        $syllables = 0;
        $words = [];

        if ($this->likeliness(45)) {
            $words[] = ['word' => $this->subject, 'syllables' => 1];
        }

        $words[] = $this->makeVerb();

        if ($this->likeliness(45)) {
            $syllablesRemaining = $this->remainingSyllables($line, $this->countSyllables($words));
            if ($syllablesRemaining >= 2) {
                $words[] = $this->getRandomArticle();
            }
        }

        if ($this->likeliness(33)) {
            $syllablesRemaining = $this->remainingSyllables($line, $this->countSyllables($words));

            if ($syllablesRemaining !== 0) {
                $length = [];

                while ($syllablesRemaining !== 0) {
                    $length[] = $syllablesRemaining;
                    $syllablesRemaining--;
                }

                $words[] = $this->makeAdjective($length);
            }
        }
        $syllablesRemaining = $this->remainingSyllables($line, $this->countSyllables($words));

        if ($syllablesRemaining !== 0) {
            $words[] = $this->makeNoun($syllablesRemaining);
        }

        $this->lineTwo = $this->makeString($words) . PHP_EOL;

    }

    public function makeLineThree() : void
    {
        $line = 3;
        $syllables = 0;
        $words = [];

        if ($this->likeliness(30)) {
            $words[] = $this->getRandomArticle();
        }
        if ($this->likeliness(65)) {
            $words[] = $this->makeAdjective();
        }
        $syllablesRemaining = $this->remainingSyllables($line, $this->countSyllables($words));

        if ($syllablesRemaining !== 0) {
            $length = [];

            while ($syllablesRemaining !== 0) {
                $length[] = $syllablesRemaining;
                $syllablesRemaining--;
            }

            $words[] = $this->makeNoun($length);
        }

        $syllablesRemaining = $this->remainingSyllables($line, $this->countSyllables($words));

        if ($syllablesRemaining !== 0) {
            $length = [];

            while ($syllablesRemaining !== 0) {
                $length[] = $syllablesRemaining;
                $syllablesRemaining--;
            }

            $words[] = $this->makeVerb($length);
        }

        if ($syllablesRemaining !== 0) {
            $words[] = $this->makeNoun($syllablesRemaining);
        }

        $this->lineThree = $this->makeString($words) . PHP_EOL;

    }

    /**
     * @param array $length
     *
     * @return array
     */
    public function makeAdjective($length = [1, 2, 3]) : array
    {
        $adjective = new Adjective();
        return $adjective->getBySyllables($length);
    }

    /**
     * @param array $length
     *
     * @return array
     */
    public function makeNoun($length = [1, 2, 3, 4]) : array
    {
        $noun = new Noun();
        return $noun->getBySyllables($length);
    }

    /**
     * @param array $length
     *
     * @return array
     */
    public function makeVerb($length = [1, 2, 3, 4, 5]) : array
    {
        $verb = new Verb();
        return $verb->getBySyllables($length);
    }

    protected function getRandomWordCategory() : string
    {
        return $this->wordCategories[array_rand($this->wordCategories)];
    }

    protected function remainingSyllables(int $line, int $syllables) : int
    {
        $max = $line === 2 ? 7 : 5;

        return $max - $syllables;
    }

    /**
     * @param int $percentage
     *
     * @throws Exception
     * @return bool
     */
    protected function likeliness(int $percentage) : bool
    {
        return $percentage <= random_int(1, 100);
    }

    protected function getRandomArticle() : array
    {
        $articles = ['A', 'The', 'My', 'Your', 'His', 'Her', 'Their'];

        return ['word' => $articles[array_rand($articles)], 'syllables' => 1];
    }

    protected function countSyllables(array $words) : int
    {
        $syllables = 0;

        foreach ($words as $word) {
            if ($word['syllables']) {
                $syllables += $word['syllables'];
            }
        }

        return $syllables;
    }

    protected function makeString($words) : string
    {
        $string = '';

        foreach ($words as $word) {
            if (array_key_exists('word', $word)) {
                $string .= $word['word'] . ' ';
            }

            if (array_key_exists('subject', $word) && $word['subject'] !== null) {
                $this->subject = $word['subject'];
            }
        }

        return $this->upperFirst($string);
    }

    protected function upperFirst(string $string) : string
    {
        return ucfirst(strtolower($string));
    }
}
