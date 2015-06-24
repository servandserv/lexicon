<?php

namespace Lexicon\Infrastructure\Helpers;

class Locator {
    
    private static $instance = null;
    private $container;

    private function __construct() {
        $this->container = [];
    }

    public static function getInstance(){
        if(!static::$instance) {
            static::$instance = new \Lexicon\Infrastructure\Helpers\Locator();
        }
        return static::$instance;
    }

    public function __get($id) {
        return $this->locate($id,$this);
    }

    public function __set($id,$val) {
        $this->container[$id] = $val;
    }

    public function once($id, $value){
        $this->{$id} = function () use ($value) {
            static $object;
            if (null === $object) {
                $object = $value();
            }
            return $object;
        };
    }

    public function locate() {
        $args = func_get_args();
        $id = array_shift($args);
        if(isset($this->container[$id])) {
            $isInvokable = is_object($this->container[$id]) && method_exists($this->container[$id], '__invoke');
            return $isInvokable ? call_user_func_array($this->container[$id],$args) : $this->container[$id];
        }
    }
}