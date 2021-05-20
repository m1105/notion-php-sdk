<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Checkbox extends PropertyBase
{
    public function value()
    {
        return $this->config->checkbox;
    }
    public function set($value): void
    {
        $this->config->checkbox = $value;
    }
    public function getValue()
    {
        if (! is_bool($this->config->checkbox)) {
            return false;
        }

        return (boolean) $this->config->checkbox;
    }
}
