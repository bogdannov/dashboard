<?php


namespace Webmagic\Dashboard\Traits\Content;


use Webmagic\Dashboard\Pages\Page;

class NoOneFieldsWereDefined extends \Exception
{
    /**
     * NoOneFieldWereDefined constructor.
     *
     * @param Page $object
     */
    public function __construct($object)
    {
        $class_name = get_class($object);
        $message = "No one field was defined in $class_name" ;
        parent::__construct($message);
    }

}