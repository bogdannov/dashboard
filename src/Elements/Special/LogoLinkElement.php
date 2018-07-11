<?php


namespace Webmagic\Dashboard\Elements\Special;


use Webmagic\Dashboard\Elements\ComplexElement;

class LogoLinkElement extends ComplexElement
{

    protected $view = 'dashboard::elements.special.logo_link';

    protected $available_fields = [
        'link',
        'part_one',
        'part_two',
        'part_one_mini',
        'part_two_mini'
    ];

    protected $default_field = 'part_one';
}