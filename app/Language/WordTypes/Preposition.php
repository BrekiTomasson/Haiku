<?php

namespace BrekiTomasson\Haiku\Language\WordTypes;

use BrekiTomasson\Haiku\Language\Traits\IsWordType;

class Preposition {

    use IsWordType;

    public function __construct()
    {
        $this->word_type = 'Preposition';
    }

}
