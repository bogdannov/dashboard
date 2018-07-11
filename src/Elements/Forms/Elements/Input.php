<?php


namespace Webmagic\Dashboard\Elements\Forms\Elements;


use Webmagic\Dashboard\Elements\ComplexElement;

class Input extends ComplexElement
{
    protected $view = 'dashboard::elements.forms.elements.input';

    protected $available_fields = [
        'id',
        'classes',
        'type' => [
            'acceptable_values' => [
                'text',
                'tel',
                'email',
                'phone',
                'password',
                'button',
                'submit'
            ],
            'default' => 'text'
        ],
        'required' => [
            'type' => 'bool',
            'default' => false
        ],
        'value',
        'placeholder'
    ];

    /**
     * Input constructor.
     *
     * @param null $content
     */
    public function __construct($content = null)
    {
        parent::__construct($content);

        $this->id = uniqid();
        $this->classes = 'form-control ';
    }


}