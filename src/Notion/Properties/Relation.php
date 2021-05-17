<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Relation extends PropertyBase
{
    public function value()
    {
        if (! is_array($this->config->title)) {
            return '';
        }

        return $this->config->relation[0]->id;
    }

    public function set($value): void
    {
        if (! is_array($this->config->relation)) {
            $this->config->relation = [];

            $this->config->relation[] = (object) [
                'id' =>  $value,
            ];

            return;
        }

        $this->config->relation[0]->id = $value;
    }

    public function getValue()
    {
        return $this->config->relation;
    }
}
