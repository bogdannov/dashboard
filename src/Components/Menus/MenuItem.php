<?php


namespace Webmagic\Dashboard\Components\Menus;


use Illuminate\Support\Collection;
use Webmagic\Dashboard\Elements\Element;
use Webmagic\Dashboard\Traits\Content\ContentFieldsUsable;
use Webmagic\Dashboard\Traits\View\ViewUsable;
use Illuminate\Support\Facades\Gate;

abstract class MenuItem extends Element
{
    use ViewUsable, ContentFieldsUsable {
        __construct as protected construct;
    }

    protected $rank = 100;

    protected $routes_activate;

    protected $urls_activate;

    protected $routes_parts;

    /** @var  Collection */
    protected $sub_items;

    /**
     * @var bool
     */
    protected $active;

    /**
     * MenuItem constructor.
     *
     * @param null $content
     */
    public function __construct($content = null)
    {
        $this->sub_items = new Collection();

        if (isset($content['active_rules'])) {

            $this->setRules($content['active_rules']);

            unset($content['active_rules']);
        };

        $this->construct($content);
    }

    /**
     * Check on access with Gates of laravel
     *
     * @return bool
     */
    public function checkOnAccess() : bool
    {
        if (empty($this->gates)){
            return true;
        }

        foreach ($this->gates as $gate) {

            if(Gate::allows($gate)){
                return true;
            }
        }

        return false;
    }


    /**
     * @return string
     */
    public function render(): string
    {
        $view = $this->getView();

        $content = $this->prepareItem();

        return view($view, ['item' => $content]);
    }

    /**
     * Preparing item array
     *
     * @return array
     */
    protected function prepareItem()
    {
        //check on active attribute
        $this->prepareActiveStatus();

        // first call this function
        // for set up sub items and active elements
        $prepared_sub_items = $this->prepareSubItems();

        $content = $this->prepareContentsForFields();

        $content['sub_items'] = $prepared_sub_items;

        return $content;
    }

    /**
     * @return int
     */
    public function getItemRank(): int
    {
        return $this->param('rank');
    }


    protected function sortSubItems()
    {
        $this->sub_items = $this->sub_items->sortByDesc(function ($item) {
            return $item->getItemRank();
        });
    }

    /**
     * Sorting by param rank
     *
     * @param $a
     * @param $b
     * @return int
     */
    protected function compareRank($a, $b)
    {

        if ($a->getItemRank() == $b->getItemRank()) {
            return 0;
        }

        return ($a->getItemRank() < $b->getItemRank()) ? 1 : -1;
    }

    /**
     * Prepare sub_items
     *
     * @param MenuItem $sub_item
     */
    public function addSubItem(MenuItem $sub_item)
    {
        $this->sub_items->push($sub_item);
    }

    protected function prepareSubItems()
    {
        $this->sortSubItems();

        $prepared_sub_items = [];

        foreach ($this->sub_items as $item) {
            $prepared_sub_items[] = $item->prepareItem();
            //set active
            //checking if sub_item is active set this element active too   m
            if ($item->isActive()) {
                $this->setActive();
                $this->setOpen();
            }
        }

        $this->fields_content['sub_items'] = $prepared_sub_items;

        return $prepared_sub_items;
    }

    /**
     * Preparing active status
     */
    public function prepareActiveStatus()
    {
        if($this->isActive()){
            $this->setActive();
        } else{
            $this->setInactive();
        }
    }

    /**
     * Check on active
     *
     * @return bool
     */
    public function isActive()
    {
        // if not set that's mean checking was done before
        if (isset($this->active)) {
            return $this->active;
        }

        // check on active by rules
        return $this->checkActivityByRules();
    }

    /**
     * Check on active
     *
     * @return bool
     */
    protected function checkActivityByRules(): bool
    {
        // active attribute is not set and we run checking
        if ($this->isActiveByUrls()) {
            return true;
        }

        if ($this->isActiveByRoutes()) {
            return true;
        }

        if ($this->isActiveByRoutesParts()) {
            return true;
        }

        return false;
    }

    /**
     * Mark menu item active
     */
    public function setActive()
    {
        $this->active = true;
    }

    /**
     * Mark menu item not active
     */
    public function setInactive()
    {
        $this->active = false;
    }

    /**
     * Set menu item open
     */
    public function setOpen()
    {
        $this->open = true;
    }

    /**
     * Add rules
     *
     * @param array $rules
     */
    public function addRules(array $rules)
    {
        $this->setRules($rules);
    }

    /**
     * Set rules by variables
     * @param $rules
     */
    protected function setRules($rules)
    {
        if (isset($rules['routes'])) {
            $this->routes_activate = $rules['routes'];
        }
        if (isset($rules['urls'])) {
            $this->urls_activate = $rules['urls'];
        }
        if (isset($rules['routes_parts'])) {
            $this->routes_parts = $rules['routes_parts'];
        }
    }

    /**
     * Check on active by url
     *
     * @return bool
     */
    protected function isActiveByUrls()
    {
        if (!$this->urls_activate) {
            return false;
        }

        //Check by string if string given
        if (!is_array($this->urls_activate)) {
            return request()->path() == $this->urls_activate || request()->url() == $this->urls_activate;
        }

        //Check by array if array given
        return in_array(request()->path(), $this->urls_activate) || request()->url() == $this->urls_activate;
    }

    /**
     * Check on active by route name
     *
     * @return bool
     */
    protected function isActiveByRoutes()
    {
        if (!$this->routes_activate) return false;

        $route_name = request()->route()->getName();

        return in_array($route_name, $this->routes_activate);
    }

    /**
     * Check on active by part of route name
     *
     * @return bool
     */
    protected function isActiveByRoutesParts()
    {
        if (!$this->routes_parts) return false;

        $route_name = request()->route()->getName();

        foreach ($this->routes_parts as $group) {

            if (strpos($route_name, $group) !== false) {
                return true;
            }
        }
        return false;
    }

}