<?php

namespace Webmagic\Dashboard\Components\Menus\NavBarMenu;


use Webmagic\Dashboard\Components\Menus\MenuItem;

class NavBarItem extends MenuItem
{
    protected $view = 'dashboard::components.menus.navbar_menu.item';

    protected $available_fields = [
        'text',
        'class',
        'link',
        'icon',
        'rank',
        'gates'
    ];

    public function __construct($content = null)
    {
        parent::__construct($content);
    }
}