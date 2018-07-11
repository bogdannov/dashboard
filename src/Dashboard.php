<?php


namespace Webmagic\Dashboard;


use Webmagic\Dashboard\Components\Menus\Menu;
use Webmagic\Dashboard\Contracts\Renderable;
use Webmagic\Dashboard\Elements\Special\LogoLinkElement;
use Webmagic\Dashboard\Pages\DefaultPage;

class Dashboard implements Renderable
{
    /** @var  Menu */
    protected $main_menu;

    /** @var  LogoLinkElement */
    protected $header_logo;

    /** @var  string|Renderable */
    protected $header_nav;

    /** @var  string|Renderable */
    protected $content_header;

    /** @var  string|Renderable */
    protected $content;

    /** @var  string|Renderable */
    protected $footer;

    /** @var  string|Renderable */
    protected $title;

    /**
     * Dashboard constructor.
     *
     * @param Menu              $main_menu
     * @param LogoLinkElement   $header_logo
     * @param string|Renderable $header_nav
     * @param string|Renderable $content_header
     * @param string|Renderable $content
     * @param string|Renderable $footer
     * @param string|Renderable $title
     */
    public function __construct(Menu $main_menu, LogoLinkElement $header_logo, $header_nav, $content_header, $content, $footer, $title)
    {
        $this->main_menu = $main_menu;
        $this->header_logo = $header_logo;
        $this->header_nav = $header_nav;
        $this->content_header = $content_header;
        $this->content = $content;
        $this->footer = $footer;
        $this->title = $title;
    }

    /**
     * Render all page content
     *
     * @return string
     */
    public function render() :string
    {
        $page = new DefaultPage([
            'header_logo' => $this->header_logo,
            'header_nav' => $this->header_nav,
            'main_sidebar' => $this->main_menu,
            'content_header' => $this->content_header,
            'content' => $this->content,
            'footer' => $this->footer,
            'title' => $this->title,
        ]);

        return $page->render();
    }

    public function setupLogo()
    {
        $header_logo = app()->make(LogoLinkElement::class);
        return $header_logo;
    }


    public function content($content)
    {
        $this->content = $content;
    }

    public function getMainMenu()
    {
        return $this->main_menu;
    }
}