<?php

final class Router {

    public static function instance()
    {
        static $instance_ = null;
        if($instance_ === null)
            $instance_ = new AltoRouter();
        return $instance_;
    }

    private function __construct()
    {
        //empty
    }
}