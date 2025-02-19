<?php namespace Notion;

use Illuminate\Support\Str;
use Notion\Properties\Checkbox;
use Notion\Properties\CreatedBy;
use Notion\Properties\CreatedTime;
use Notion\Properties\Date;
use Notion\Properties\Email;
use Notion\Properties\File;
use Notion\Properties\Formula;
use Notion\Properties\LastEditedBy;
use Notion\Properties\LastEditedTime;
use Notion\Properties\MultiSelect;
use Notion\Properties\Number;
use Notion\Properties\People;
use Notion\Properties\PhoneNumber;
use Notion\Properties\Relation;
use Notion\Properties\Rollup;
use Notion\Properties\Select;
use Notion\Properties\Title;
use Notion\Properties\URL;

class ObjectBase
{
    public $id;

    protected $nextCursor;

    protected $hasMore;

    protected $object;

    protected $notion;

    public function __construct($data, $notion)
    {
        $this->notion = $notion;

        if (! $data) {
            return;
        }

        $this->handleResponse($data);
    }

    protected function handleResponse($data)
    {
        $this->setProperties($data);
    }

    protected function setProperties($data): void
    {
        $this->id = $data->id;
        $this->created_time = $data->created_time;
        $this->last_edited_time = $data->last_edited_time;

        if (isset($data->archived)) {
            $this->archived = $data->archived;
        }

        foreach ($data->properties as $label => $property) {
            $this->properties[Str::camel($label)] = $this->createNewProperty($label, $property);
        }
    }

    protected function createNewProperty($label, $property)
    {
        switch ($property->type) {
            case "relation":
                return new Relation($label, $property);
            case "checkbox":
                return new Checkbox($label, $property);
            case "created_by":
                return new CreatedBy($label, $property);
            case "created_time":
                return new CreatedTime($label, $property);
            case "date":
                return new Date($label, $property);
            case "email":
                return new Email($label, $property);
            case "file":
                return new File($label, $property);
            case "formula":
                return new Formula($label, $property);
            case "last_edited_by":
                return new LastEditedBy($label, $property);
            case "last_edited_time":
                return new LastEditedTime($label, $property);
            case "multi_select":
                return new MultiSelect($label, $property);
            case "number":
                return new Number($label, $property);
            case "people":
                return new People($label, $property);
            case "phone_number":
                return new PhoneNumber($label, $property);
            case "rich_text":
                return new RichText($label, $property);
            case "rollup":
                return new Rollup($label, $property);
            case "select":
                return new Select($label, $property);
            case "title":
                return new Title($label, $property);
            case "url":
                return new URL($label, $property);
            default:
                return new PropertyBase($label, $property);
        }
    }
}
