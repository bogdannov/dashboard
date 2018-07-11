<?php


namespace Webmagic\Dashboard\Elements\Buttons;


use Webmagic\Dashboard\Elements\ComplexElement;

class Button extends ComplexElement
{
    protected $view = 'dashboard::elements.buttons.button';

    protected $available_fields = [
        'content',
        'classes',
    ];

    protected $default_field = 'content';
}