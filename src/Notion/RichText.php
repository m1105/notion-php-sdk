<?php namespace Notion;

class RichText extends PropertyBase
{
    public function value()
    {
        if (! is_array($this->config->rich_text)) {
            return '';
        }

        return $this->config->rich_text[0]->text->content;
    }
    public function set($value): void
    {
        if (! is_array($this->config->rich_text)) {
            $this->config->rich_text = [];
            $this->config->rich_text[] = (object) [
                'text' => (object) [
                    'content' => $value,
                ],
            ];

            return;
        }
        $this->config->rich_text[0]->text->content = $value;
    }
    public function getValue()
    {
        return $this->config->rich_text;
    }
}
