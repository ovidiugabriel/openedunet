<?php

trait PatternMatching {
    private function match_entry(IDefault $object, callable $func) {
        if ($object == $this) {
            $func($this);
            return true;
        }        

        if ($object->is_default() && (gettype($this) == gettype($object))) {
            $func($this);
            return true;
        }
        return false;
    }

    public function match(array $entries) {
        foreach ($entries as $entry) {
            list($object, $callback) = $entry;
            if ($this->match_entry($object, $callback)) {
                break;
            }
        }
    }
}
