<?php


namespace Webmagic\Dashboard\Components\Menus;


use Illuminate\Support\Collection;
use Webmagic\Dashboard\Components\Component;
use Webmagic\Dashboard\Traits\View\ViewUsable;

abstract class Menu extends Component
{
    use ViewUsable;

    /** @var  Collection */
    protected $items;

    /**
     * Menu constructor.
     */
    public function __construct()
    {
        $this->items = new Collection();
    }

    /**
     * Add item to collection
     *
     * @param MenuItem $menuItem
     */
    public function addItem(MenuItem $menuItem)
    {
        $this->items->push($menuItem);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $this->sort();

        $view = $this->getView();

        $content = $this->prepareItemsRender();

        return view($view, compact('content'));
    }



    /**
     * Prepare rendered menu items string
     *
     * @return string
     */
    protected function prepareItemsRender()
    {
        $content = '';
        foreach ($this->items as $item){

            if(!$item->checkOnAccess()){
                continue;
            }
            $content .= $item->render();
        }
        return $content;
    }

    protected function sort()
    {
        $this->items = $this->items->sortByDesc(function($item){
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


}