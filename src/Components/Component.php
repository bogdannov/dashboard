<?php


namespace Webmagic\Dashboard\Components;


use Webmagic\Dashboard\Contracts\Renderable;

abstract class Component implements Renderable
{
    /**
     * Render current component and return result string
     *
     * @return string
     */
    abstract public function render(): string;

}