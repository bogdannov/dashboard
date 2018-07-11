<?php


namespace Webmagic\Dashboard\Elements\Boxes;


use Webmagic\Dashboard\Elements\ComplexElement;

class Box extends ComplexElement
{
    protected $view = 'dashboard::elements.boxes.box';

    protected $available_fields = [
        'box_type',
        'box_title',
        'box_tools',
        'box_body',
        'box_footer',
        'header_available' => [
            'type' => 'bool',
            'default' => true
        ],
        'footer_available' => [
            'type' => 'bool',
            'default' => true
        ],
        'color_type' => [
            'default' => 'default',
            'acceptable_values' => [
                'default',
                'primary',
                'info',
                'warning',
                'success',
                'danger'
            ]
        ],
        'solid' => [
            'type' => 'bool',
            'default' => false
        ]
    ];

    protected $default_field = 'box_body';
}

