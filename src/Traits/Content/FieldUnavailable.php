<?php


namespace Webmagic\Dashboard\Traits\Content;

class FieldUnavailable extends \Exception
{
    /**
     * SectionNotDefined constructor.
     *
     * @param string $field_name
     * @param        $object
     */
    public function __construct(string $field_name, $object)
    {
        $class = get_class($object);
        $message = "Field $field_name is unavailable in $class";

        parent::__construct($message);
    }

}