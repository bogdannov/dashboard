<?php


namespace Webmagic\Dashboard\Components\Menus\MainMenu;



use Webmagic\Dashboard\Components\Menus\MenuItem;

class Item extends MenuItem
{

    /** @var string View */
    protected $view = 'dashboard::components.menus.main_menu.item';

    protected $available_fields = [
        'text',
        'class',
        'link',
        'icon',
        'rank',
        'gates'
    ];

    protected $default_field = 'text';

    protected $open = false;


    /**
     * @return array
     */
    public function prepareContentsForFields()
    {
        $this->available_fields[] = 'open';
        $this->available_fields[] = 'active';

        parent::prepareContentsForFields();

        return $this->fields_content;
    }

    /**
     * Prepare value for text field with translation possibility
     *
     * @return mixed
     */
    protected function getText()
    {
        $value = isset($this->text) ? $this->text : $this->getFieldDefaultValue('text');

        return $value ? __($value) : $value;
    }

}