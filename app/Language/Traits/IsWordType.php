<?php

namespace BrekiTomasson\Haiku\Language\Traits;

trait IsWordType {

    public $word_type;
    public $lexicon;

    public function syllables() : int
    {
        //
    }

    public function type() : string
    {
        return $this->word_type;
    }

}
