<?php


namespace Webmagic\Dashboard\Elements\Forms\Elements;


use Webmagic\Dashboard\Elements\ComplexElement;

class FormGroup extends ComplexElement
{
    protected $view = 'dashboard::elements.forms.elements.form_group';

    protected $available_fields = [
        'label',
        'input',
        'label_id'
    ];

    /**
     * FormGroup constructor.
     *
     * @param null  $content
     */
    public function __construct($content = null)
    {
        parent::__construct($content);

        //Set default input, if did not set
        if(empty($this->input)){
            $this->setInput(new Input);
        }
    }

    /**
     * Set input param
     *
     * @param Input $input
     */
    public function setInput(Input $input)
    {
        $id = $input->param('id');
        $this->param('label_id', $id);
        $this->input = $input;
    }
}