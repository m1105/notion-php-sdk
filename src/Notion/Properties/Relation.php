<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Relation extends PropertyBase {
    public function value() {
        if (!is_array($this->config->relation)) {
            return '';
        }

        return $this->config->relation;
    }

    public function set($value): void {
        if (empty($value)) {
            if (!is_array($this->config->relation)) {
                $this->config->relation = [];
                return;
            }
        } else {
            if (!is_array($this->config->relation)) {
                $this->config->relation = [];
                $this->config->relation[] = (object)[
                    'id' => $value,
                ];
                return;
            }
            $this->config->relation[0]->id = $value;
        }
    }

    public
    function getValue() {
        return $this->config->relation;
    }
}
