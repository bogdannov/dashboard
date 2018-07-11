<?php


namespace Webmagic\Dashboard\Elements;


class SimpleStringElement extends Element
{
    /** @var  string */
    protected $content;

    /**
     * SimpleStringElement constructor.
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->getContent();
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }


    /**
     * @return string
     */
    protected function getContent()
    {
        return $this->content;
    }
}