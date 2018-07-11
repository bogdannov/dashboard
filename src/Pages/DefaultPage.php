<?php


namespace Webmagic\Dashboard\Pages;


class DefaultPage extends Page
{
    /** @var string  */
    protected $view = 'dashboard::pages.default_page';

    protected $available_fields = [
        'header_logo',
        'header_nav',
        'main_sidebar',
        'content_header',
        'content',
        'footer',
        'title'
    ];

    protected $default_field = 'content';
}