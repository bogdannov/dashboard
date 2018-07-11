<?php


namespace Webmagic\Dashboard\Elements;


use Webmagic\Dashboard\Traits\Content\ContentFieldsUsable;
use Webmagic\Dashboard\Traits\View\ViewUsable;

class ComplexElement extends Element
{
    use ViewUsable, ContentFieldsUsable;

    /**
     * @return string
     */
    public function render(): string
    {
        $view = $this->getView();
        $content = $this->prepareContentsForFields();

        return view($view, $content);
    }
}