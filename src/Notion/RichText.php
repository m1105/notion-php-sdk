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
                'type' => $value['type']?$value['type']:'text',
                'text' => (object) [
                    'content' => $value['content'],
                    'link' => $value['link']?$value['link']:null,
                ],
                'annotations' => (object)$value['annotations']?$value['annotations']:[],
                'plain_text' => $value['content'],
                'href' => $value['href']?$value['href']:null,
            ];

            return;
        }
        $this->config->rich_text[0]->type = $value['type']?$value['type']:'text';
        $this->config->rich_text[0]->text->content = $value['content'];
        $this->config->rich_text[0]->text->link = $value['link']?$value['link']:null;
        $this->config->rich_text[0]->annotations = $value['annotations']?$value['annotations']:[];
        $this->config->rich_text[0]->plain_text = $value['content'];
        $this->config->rich_text[0]->href = $value['href']?$value['href']:null;
    }

    public function getValue()
    {
        return $this->config->rich_text;
    }
}
