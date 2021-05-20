<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Date extends PropertyBase
{
    public function value()
    {
        return $this->config->date;
    }

    public function set($value): void
    {
        {
            if (! is_array($this->config->date)) {
                if (isset($value['end'])) {
                    $this->config->date = (object)[
                        'start' => date(DATE_ISO8601, strtotime($value['start'])),
                        'end' => date(DATE_ISO8601, strtotime($value['end'])),
                    ];
                } else {
                    $this->config->date = (object)[
                        'start' => date(DATE_ISO8601, strtotime($value['start'])),
                    ];
                }

                return;
            }
            $this->config->date->start = date(DATE_ISO8601, strtotime($value['start']));
            if (isset($value['end'])) {
                $this->config->date->end = date(DATE_ISO8601, strtotime($value['end']));
            }
        }
    }



    public function getValue()
    {
        return $this->config->date;
    }
}
