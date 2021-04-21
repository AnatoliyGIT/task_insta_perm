<?php
require_once './functions.php';

class Hook {
    protected $callbacks;

    public function __construct($callbacks = []) {
        $this->callbacks = [];

        if (!isset($callbacks) || !is_array($callbacks) || sizeof($callbacks)) {
            return;
        }

        foreach ($callbacks as $k => $v) {
            if (!is_string($k) || !isset($v) || !is_callable($v)) {
                continue;
            }

            $this->callbacks[$k] = $v;
        }
    }

    public function add($key, $callback) {
        if (!isset($key) || !isset($callback) || !is_string($key) || !is_callable($callback)) {
            return;
        }

        $this->callbacks[$key] = $callback;
    }

    public function remove($key) {
        if ($this->exists($key)) {
            unset($this->callbacks[$key]);
        }
    }

    public function exists($key) {
        return isset($key) && array_key_exists($key, $this->callbacks);
    }

    public function run($key, ...$args) {
        if ($this->exists($key)) {
            $func = $this->callbacks[$key];

            if (!isset($args) || !is_array($args)) {
                $args = [];
            }

            if (isset($func)) {
                $func(...$args);
            }
        }
    }
}