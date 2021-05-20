<?php namespace Notion\Properties;

use Notion\PropertyBase;

class People extends PropertyBase
{
    public function value()
    {
        if (! is_array($this->config->people)) {
            return '';
        }

        return $this->config->people;
    }

    public function set($value): void
    {
        if (! is_array($this->config->people)) {
            $this->config->people = [];
            $this->config->people[] = (object) [
                'object' => $value['object'],
                'id' => $value['id'],
            ];

            return;
        }

        $this->config->people[0]->object = $value['object'];
        $this->config->people[0]->id = $value['id'];
    }

    public function getValue()
    {
        return $this->config->people;
    }
}
