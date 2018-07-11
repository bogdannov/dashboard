<?php


namespace Webmagic\Dashboard\Traits\Content;

class FieldNotDefined extends \Exception
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
        $message = "Field $field_name undefined in $class";

        parent::__construct($message);
    }

}