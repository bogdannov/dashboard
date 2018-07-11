<?php


namespace Webmagic\Dashboard\Contracts;


interface Renderable
{
    /**
     * Render current component and return result string
     *
     * @return string
     */
    public function render(): string;
}