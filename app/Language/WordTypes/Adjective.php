<?php

namespace BrekiTomasson\Haiku\Language\WordTypes;

use BrekiTomasson\Haiku\Language\Lexicon\AdjectiveList;
use BrekiTomasson\Haiku\Language\Traits\IsWordType;

class Adjective {

    use IsWordType;

    public function __construct()
    {
        $this->word_type = 'Adjective';
        $this->lexicon = new AdjectiveList();
    }

}
