<?php

namespace BrekiTomasson\Haiku;

class App {

    public static $core;

    public function __construct()
    {
        $this->boot();

        $this->register();

        $this->run();
    }

    protected function boot()
    {
        self::$core = new Core();
    }

    protected function register ()
    {
        //
    }

    protected function run()
    {
        //
    }

}
