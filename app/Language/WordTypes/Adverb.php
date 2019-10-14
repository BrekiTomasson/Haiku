<?php

namespace BrekiTomasson\Haiku\Language\WordTypes;

use BrekiTomasson\Haiku\Language\Traits\IsWordType;

class Adverb {

    use IsWordType;

    public function __construct()
    {
        $this->word_type = 'Adverb';
    }

}
