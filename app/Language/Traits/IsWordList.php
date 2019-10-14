<?php

namespace BrekiTomasson\Haiku\Language\Traits;

abstract class IsWordList {

    public $list;
    public $word;

    public function getRandomWord() : string
    {
        return array_rand($this->list);
    }

}
