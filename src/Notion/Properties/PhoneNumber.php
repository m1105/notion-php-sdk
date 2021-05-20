<?php namespace Notion\Properties;

use Notion\PropertyBase;

class PhoneNumber extends PropertyBase
{
    public function value()
    {
        return $this->config->phone_number;
    }

    public function set($value): void
    {
        $this->config->phone_number = $value;
    }

    public function getValue()
    {
        return $this->config->phone_number;
    }
}
