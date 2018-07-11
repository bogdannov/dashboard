<?php


namespace Webmagic\Dashboard\Traits\Content;


class UnacceptableValueException extends \Exception
{

    /**
     * UnacceptableValueException constructor.
     *
     */
    public function __construct($value, $name, $class)
    {
        $message = "Value $value is unacceptable for field $name in $class";

        parent::__construct($message);
    }
}