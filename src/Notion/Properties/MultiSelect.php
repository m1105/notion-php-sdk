<?php namespace Notion\Properties;

use Notion\PropertyBase;

class MultiSelect extends PropertyBase
{
    public function value()
    {
        if (! is_array($this->config->multi_select)) {
            return '';
        }

        return $this->config->multi_select[0]->name;
    }

    public function set($value): void
    {
        if (! is_array($this->config->multi_select)) {
            $this->config->multi_select = [];

            $this->config->multi_select[] = (object) [
                'name' => $value['name'],
                'color' => $value['color']?$value['color']:null,
            ];

            return;
        }

        $this->config->multi_select[0]->name = $value['name'];
        $this->config->multi_select[0]->color = $value['color']?$value['color']:null;
    }

    public function getValue()
    {
        return $this->config->multi_select;
    }
}
