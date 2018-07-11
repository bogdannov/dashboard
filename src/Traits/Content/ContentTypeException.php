<?php


namespace Webmagic\Dashboard\Traits\Content;


class ContentTypeException extends \Exception
{
    /**
     * ContentTypeException constructor.
     *
     */
    public function __construct()
    {
        $message = "Content must be a string or implement Renderable interface";
        parent::__construct($message, $code, $previous);
    }

}