<?php

namespace BrekiTomasson\Haiku;

use BrekiTomasson\Haiku\Language\Builder;

class App {

    /** @var Builder */
    public $builder;

    public function __construct()
    {
        $this->boot();

        $this->register();

    }

    protected function boot() : void
    {
        $this->builder = new Builder();
    }

    protected function register () : void
    {
        //
    }

}
