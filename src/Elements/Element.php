<?php


namespace Webmagic\Dashboard\Elements;


use Webmagic\Dashboard\Contracts\Renderable;

abstract class Element implements Renderable
{
    /**
     * Render current component and return result string
     *
     * @return string
     */
    abstract public function render(): string;
}