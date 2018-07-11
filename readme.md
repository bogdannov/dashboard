[Test](docs/test.md)

# Dashboard builder module
This module may be used for build dashboard based on any stiles. In current realization we will use AdmiLTE template but maybe in future core functionality will move to separate project

##Description
Main idea of this module is to give possibility in fast generation of dashboard pages from php. At the same time, to give possibility to flexibly configure, expand and modify the generation process

##Quick start
###Module configuration
For configure dashboard you should include in config/app include DashboardServiceProvider class

```php
 'providers' => [
    ...
    \Webmagic\Dashboard\DashboardServiceProvider::class
 ]
```

for publishing views, assets and config file run command:

php artisan vendor:publish --tag=dashboard

Here you go!


###Page generation
For create page use this code in your controller:

```php
$page = new Webmagic\Dashboard\Pages\DefaultPage();`
return = $page->render();
```
After this you will have base page - http://joxi.ru/n2YZ48jCjkxvxA

I default page you can define content for next fields:
* header_logo
* header_nav
* main_sidebar
* content_header
* content
* footer

For define content in section use next:
```php
$page->setFieldContent('Test content content', 'content_header');
```
You will see - http://joxi.ru/52avd1VcGlO1bA

As a content of field you can use string or any object which implements interface `Webmagic\Dashboard\Contracts\Renderabl`

If you will no specify name of content block default block will be used. For default page it is `content`
```php
$page->setFieldContent('Content without block specification');
```
You will see - http://joxi.ru/V2VdVnjC0B33Er

Also you can define content in constructor method. In this case default block will be used
```php
$page = new Webmagic\Dashboard\Pages\DefaultPage('Content without block specification');
```
You will see - http://joxi.ru/V2VdVnjC0B33Er

And also you can define few content blocks in construct method:
```php
$page = new Webmagic\Dashboard\Pages\DefaultPage([
    'content' => 'Main content block',
    'footer' => 'Footer content block'
]);
```
You will see - http://joxi.ru/brRQbDvfQBeayA

###Dashboard

Dashboard it's just class which creating DefaultPage with settings and call method render.
But this class is singleton that's mean once you set up class then you will get the same class in any part of your app.  
More about singleton for example here : http://dron.by/post/pattern-proektirovaniya-singleton-odinochka-na-php.html
Dashboard can get the same with DefaultPage.

```php
Route::get('dashboard', function () {
   return app()->make(\Webmagic\Dashboard\Dashboard::class)->render();
});
```

###Define logo
For prepare logo for your page you should use special element `Webmagic\Dashboard\Elements\Special\LogoLinkElement`

Use next code for define logo:
```php
    $logo_link_element = new \Webmagic\Dashboard\Elements\Special\LogoLinkElement([
        'part_one' => 'Interface',
        'part_two' => 'Generator',
        'part_one_mini' => 'I',
        'part_two_mini' => 'G',
        'link' => url('/'),
    ]);
    $page->setFieldContent($logo_link_element, 'header_logo');
    return $page->render();
```
You will see - http://joxi.ru/D2P3pjvcdwKQ9m and http://joxi.ru/xAevaGVcYMj3kr

###Work with main menu
For use main menu you should use special component `Webmagic\Dashboard\Components\Menus\MainMenu\MainMenu`
As menu items you can use `Webmagic\Dashboard\Components\Menus\MainMenu\Item`
Menu has no content block. You can only add item into that.

Menu Item has next content block:
```php
$available_fields = [
        'text',
        'class',
        'link',
        'icon',
        'rank',
        'gates'
    ];
```

#### Structure of setup menu

- text  - Default is text. 
- icon - As icon you can use any icon form available in AdminLTE fonts - https://adminlte.io/themes/AdminLTE/pages/UI/icons.html
- rank - parameter need for sort show menu (priority which will be first)
- link - link where will be direct
- gates - Array of gates (https://laravel.com/docs/5.5/authorization#gates)
- subitems - Array of subitems
- active_rules - Array of rules when item/subitem will be active
  
####Gates
You can pass into attribute 'gates' names of your registered gates and if will be at least one true this item will be
show in other case no. About gates - https://laravel.com/docs/5.5/authorization#gates

Example pass:
  ```php

            'text' => 'Level 1',
            'icon' => '',
            'link' => url('dashboard'),
            'gates' => ['admin', 'manager', 'guest']
            'active_rules' => [
                'urls' => [
                    'dashboard'
                ],
            ],
```

You can set up MainMenu just pass an array with next structure:
```php
'menu_items_config' => [
        [
            'text' => 'Level 1',
            'icon' => '',
            'link' => url('dashboard'),
            'gates' => ['admin']
            'active_rules' => [
                'urls' => [
                    'dashboard'
                ],
            ],
            'subitems' => [
                [
                    'text' => 'level 2',
                    'icon' => 'fa-book',
                    'link' => url('/'),
                    'subitems' => [
                        [
                            'text' => 'level 3',
                            'icon' => 'fa-book',
                            'link' => url('dashboard/some'),
                            'rank' => 800,
                            'active_rules' => [
                                'urls' => [
                                    'dashboard/some'
                                ],
                            ],
                        ],
                        [
                            'text' => 'level 3 second time',
                            'icon' => 'fa-book',
                            'link' => url('dashboard/test2'),
                            'rank' => 900,
                            'active_rules' => [
                                'routes'=>[
                                    'tech::test',
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        ],
        [
            'text' => 'Level 1(second)',
            'icon' => 'fa-book',
            'link' => url('dashboard/test'),
            'rank' => 200,
            'active_rules' => [
                'routes_parts'=>[
                    'tech::',
                    'another::'
                ],
            ]
        ]
    ]

$main_menu = new \Webmagic\Dashboard\Components\Menus\MainMenu\MainMenu($menu_items);

```php

!!! Every item/sub_item should be array !!! . For set sub_item - declare  'subitems' key and pass array with arrays of itms. Depth of sub items are not limited.

Also you can set in dashboard_config in menu_items_config array and it will be set up from this array.

active_rules - array conditions when item will set as active it can include the next :

 - routes_parts - will be look for matches with current route NAME with and values in routes_parts array. Values can be any. Can be part of route or name of group doesn't matter.
 - routes - will be compare current route NAME with values in array routes. Values can be only NAMES of route.
 - urls - will be compare current route with values in urls. Values can be only PATH without domain like - 'dashboard/products'

active_rules you can set in array Item or by function
 ```php
$item->addRules([
    'routes_parts' => [
        'dashboard::'
    ],
    'routes' => [
        'filter-page'
    ],
    'urls' => [
        'dashboard/test'
    ]
])
```

Also you can set sub item for any item. Depth of sub items are not limited.
You can use few methods for management activity of item

```php
    //create new menu
    $main_menu = new \Webmagic\Dashboard\Components\Menus\MainMenu\MainMenu();
    
    //create item
    $menu_regular_item = new \Webmagic\Dashboard\Components\Menus\MainMenu\Item([
        'text' => 'Regular item',
        'icon' => 'fa-book',
        'link' => url('/'),
        'rank' => 200
    ]);
    
    //add item to menu
    $main_menu->addItem($menu_regular_item);

    //create item
    $menu_tree = new \Webmagic\Dashboard\Components\Menus\MainMenu\Item([
        'text' => 'Tree item',
        'icon' => 'fa-book',
        'link' => url('/')
    ]);
    
    //set items as sub item
    $menu_regular_item->addSubItem($menu_regular_item);
    $menu_regular_item->addSubItem($menu_regular_item);
    $menu_regular_item->addSubItem($menu_regular_item);
    $menu_regular_item->addSubItem($menu_regular_item);
    $menu_tree->addSubItem($menu_regular_item);
    
    //set item as active
    $menu_tree->setActive();
   
    //add item to menu
    $main_menu->addItem($menu_tree);
    
    //put menu in page content block
    $page->setFieldContent($main_menu, 'main_sidebar');
```

You will see - http://joxi.ru/Dr84LKVHkKeMEr
And you will have many sub items. Depth of sub items not limited


###Work with navbar menu
NavBar menu extends MainMenu so the functionality and ability the same as Main menu

##Front

Building setting up with gulp and webpack,  all commands you can run with gulp.
In building setup two environments 'dev' and 'prod'

'dev' environment run building front into root public directory
'prod' environment run building front into module public directory

for set/change environment run in console command - set NODE_ENV=prod

##Updating assets after module updated
For update assets after module updated you can use console command:

`php artisan dashboard::assets-update`

This command will removed your current assets and copied new assets for package. Destination path you can change with param --path. As default it is `public_path('webmagic/dashboard')` 