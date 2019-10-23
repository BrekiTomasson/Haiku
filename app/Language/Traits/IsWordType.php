<?php

namespace BrekiTomasson\Haiku\Language\Traits;

trait IsWordType {

    public $word_type;
    public $lexicon;
    protected $subject;

    public function __construct()
    {
        $this->subject = 'it';
    }

    public function syllables() : int
    {
        // @TODO
    }

    public function type() : string
    {
        return $this->word_type;
    }

    public function getRandom() : array
    {
        $syllables = array_rand($this->lexicon->list);

        $word = $this->lexicon->list[$syllables][array_rand($this->lexicon->list[$syllables])];

        $word = $this->fixSpecialCases($word);

        return ['word' => $word, 'syllables' => $syllables, 'subject' => $this->subject];
    }

    public function getBySyllables($syllables) : array
    {
        if (is_array($syllables)) {
            $words = [];
            foreach ($syllables as $syllable) {
                foreach ($this->lexicon->list[$syllable] as $iteration) {

                    $iteration = $this->fixSpecialCases($iteration);

                    $words[] = [
                        'word'      => $iteration,
                        'syllables' => $syllable,
                        'subject'   => $this->subject,
                    ];
                };
            }

            return $words[array_rand($words)];

        }

        if (is_int($syllables)) {
            $word = $this->lexicon->list[$syllables][array_rand($this->lexicon->list[$syllables])];

            $word = $this->fixSpecialCases($word);

            return [
                'word'      => $word,
                'syllables' => $syllables,
                'subject'   => $this->subject,
            ];
        }
    }

    protected function fixSpecialCases($input)
    {
        if (is_string($input)) {
            $this->subject = 'it';
            return $input;
        }

        if (is_array($input)) {
            if (array_key_exists('subject', $input)) {
                $this->subject = $input['subject'];
            }
            return $input['word'];
        }
    }

}
