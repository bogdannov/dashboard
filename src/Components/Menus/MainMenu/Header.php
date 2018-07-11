<?php


namespace Webmagic\Dashboard\Components\Menus\MainMenu;


use Webmagic\Dashboard\Components\Menus\MenuItem;

class Header extends MenuItem
{
    protected $available_fields = [
        'text',
        'class'
    ];

    protected $view = 'dashboard::components.menus.main_menu.header';
}