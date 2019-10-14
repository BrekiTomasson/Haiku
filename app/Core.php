<?php

namespace BrekiTomasson\Haiku;

use BrekiTomasson\Haiku\Helpers\SyllableFinder;

class Core {

    public $modules = [];

    public function __construct ()
    {
        $this->modules['counter'] = new SyllableFinder();
    }

    public function count(string $word)
    {
        return $this->modules['counter']->getSyllableCount($word);
    }
}
