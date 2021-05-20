<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Select extends PropertyBase {
    public function value() {
        return $this->config->select->name;
    }

    public function set($value): void {
        if (empty($value))
            $this->config->select = [];
        else
            $this->config->select->name = $value;

    }

    public function setColor($value = "default"): void {
        $this->config->select->color = $value;
    }

    public function getValue() {
        return $this->config->select;
    }
}
