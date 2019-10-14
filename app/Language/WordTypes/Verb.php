<?php

namespace BrekiTomasson\Haiku\Language\WordTypes;

use BrekiTomasson\Haiku\Language\Lexicon\VerbList;
use BrekiTomasson\Haiku\Language\Traits\IsWordType;

class Verb {

    use IsWordType;

    public function __construct()
    {
        $this->word_type = 'Verb';
        $this->lexicon = new VerbList();
    }

}
