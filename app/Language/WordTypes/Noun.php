<?php

namespace BrekiTomasson\Haiku\Language\WordTypes;

use BrekiTomasson\Haiku\Language\Lexicon\NounList;
use BrekiTomasson\Haiku\Language\Traits\IsWordType;

class Noun {

    use IsWordType;

    public function __construct()
    {
        $this->word_type = 'Noun';
        $this->lexicon = new NounList();
    }

}
