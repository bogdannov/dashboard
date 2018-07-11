<?php


namespace Webmagic\Dashboard\Pages;


use Webmagic\Dashboard\Contracts\Renderable;
use Webmagic\Dashboard\Traits\Content\ContentFieldsUsable;
use Webmagic\Dashboard\Traits\View\ViewUsable;

abstract class Page implements Renderable
{
    use ViewUsable, ContentFieldsUsable;

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        $view = $this->getView();
        $content = $this->prepareContentsForFields();

        return view($view, $content);
    }
}