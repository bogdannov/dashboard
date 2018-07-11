<?php


namespace Webmagic\Dashboard\Traits\View;


trait ViewUsable
{
    /** @var  string View for page */
//    protected $view;

    /**
     * Return view for current page
     * @return mixed
     * @throws ViewUndefined
     */
    public function getView()
    {
        if(isset($this->view) && $this->view != ''){
            return $this->view;
        }

        throw new ViewUndefined($this);
    }
}