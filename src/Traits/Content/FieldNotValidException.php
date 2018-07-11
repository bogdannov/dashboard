<?php


namespace Webmagic\Dashboard\Traits\Content;

class FieldNotValidException extends \Exception
{
    public function __construct($field_name, $realType, $neededType, $class)
    {
        $message = "Field $field_name should be $neededType, but " . $realType . " given in " . $class;

        parent::__construct($message);
    }

}