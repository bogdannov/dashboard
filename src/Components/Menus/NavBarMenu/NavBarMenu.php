<?php

namespace Webmagic\Dashboard\Components\Menus\NavBarMenu;

use Webmagic\Dashboard\Components\Menus\MainMenu\MainMenu;

class NavBarMenu extends MainMenu
{
    /** @var string View */
    protected $view = 'dashboard::components.menus.navbar_menu.menu';

    protected $itemClass = NavBarItem::class;

    function __construct($items_array = null)
    {
        parent::__construct($items_array);
    }
}